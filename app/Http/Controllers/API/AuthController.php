<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = User::where($fieldType, $request->username)->where('role_id', config('env.role.admin'))->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->setResponse(null, 'Username atau Password salah', 401);
        }

        return $this->setResponse([
            'access_token' => $user->createToken($user->username)->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => config('sanctum.expiration') ? Carbon::parse(
                config('sanctum.expiration')
            )->toDateTimeString() : null,
            'user' => UserResource::make($user),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->setResponse(null, 'Logout successfully');
    }

    public function me()
    {
        $user = Auth::user();
        return $this->setResponse(UserResource::make($user));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string',
            'username' => 'required|string|alpha_dash|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return $this->setResponse($user);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return $this->setResponse(['old_password' => 'Password lama salah'], 'Silahkan isi form dengan benar', 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $this->setResponse(null, 'Password berhasil diubah');
    }

    public function uploadImage(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'type' => 'required|string|in:profile',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        }

        DB::beginTransaction();
        $model = $user->images()->where('type', $request->type)->first();
        if ($model) {
            $model->deleteFile();
        } else {
            $model = new UserImage();
            $model->type = $request->type;
        }

        $path = '/user' . '/' . $request->type;

        if (!File::exists(public_path('uploads' . $path))) {
            File::makeDirectory(public_path('uploads' . $path), 0777, true, true);
        }

        $fileName = time() . '.' . $request->file('image')->extension();
        $file = $request->file('image');

        $canvas = Image::canvas(400, 400, '#ffffff');
        $img = Image::make($file->getRealPath());
        $height = $img->height();
        $width = $img->width();
        $img->resize($width > $height ? 400 : null, $height >= $width ? 400 : null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $canvas->insert($img, 'center');
        $canvas->save(public_path('uploads') . $path . '/' . $fileName);

        $model->path = $path . '/' . $fileName;
        $model->user_id = $user->id;

        $model->save();
        $model->link = asset('uploads' . $model->path);
        DB::commit();

        return $this->setResponse($model);
    }
}
