<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserDocument;
use App\Models\UserImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AuthUserController extends Controller
{
    public function cekVerified(){
        $user = Auth::user();
        if($user->detail && $user->detail->status == 'verified'){
            return $this->setResponse(['status' => true], null, 200);
        }
        
        return $this->setResponse(['status' => false], null, 200);
    }

    public function register(Request $request)
    {
        $rules = [
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username|alpha_dash|min:3',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',

            'nomor_telepon' => 'required|numeric|digits_between:10,13',
            'type' => 'nullable|string|in:personal,kelompok',
            'group' => 'nullable|string|in:komunitas,perusahaan,organisasi,lembaga|required_if:type,kelompok',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }

        DB::beginTransaction();
        $user = User::create([
            'name' => $request->nama,
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'role_id' => config('env.role.user'),

            'phone_number' => $request->nomor_telepon,
            'type' => $request->type ?? 'personal',
            'group' => $request->group ?? null,
        ]);
        $user->sendEmailVerificationNotification();
        DB::commit();
        
        return $this->setResponse(null, 'User created successfully');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules, [], ['username' => 'username atau email']);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            'role_id' => config('env.role.user'),
            $fieldType => $request->username,
            'password' => $request->password
        ];

        $user = User::where($fieldType, $request->username)->where('role_id', config('env.role.user'))->first();
        if($user && $user->google_id && !$user->password){
            return $this->setResponse(null, 'Akun ini hanya bisa login menggunakan google', 401);
        }

        if (!auth('web')->attempt($credentials)) {
            return $this->setResponse(null, 'Username atau password salah', 401);
        }

        $user = auth()->user();
        if (!$user->hasVerifiedEmail()) {
            return $this->setResponse(null, 'Email belum di verifikasi', 401);
        }

        return $this->setResponse([
            'access_token' => $user->createToken($user->username)->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => config('sanctum.expiration') ? Carbon::parse(
                config('sanctum.expiration')
            )->toDateTimeString() : null,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->setResponse(null, 'Logout successfully');
    }

    public function me()
    {
        // $user = Auth::user();
        // return $this->setResponse(UserResource::make($user));

        $user = User::where('id', Auth::id())->with(['detail.documents', 'detail.village.district.regency.province', 'photoProfile'])->first();
        return $this->setResponse(UserResource::make($user));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'foto' => 'nullable|image|mimes:jpg,jpeg,png',
            'username' => 'required|string|alpha_dash|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string',
            'nik' => 'required|int|unique:user_details,nik,' . ($user->detail->id ?? 0),
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'gender' => 'required|in:L,P',
            // 'phone_number' => 'required|numeric|unique:user_details,phone_number,' . ($user->detail->id ?? 0),
            'phone_number' => 'required|numeric',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png',
            'village' => 'required|exists:villages,id',
            'bank_name' => 'required|string',
            'rek_name' => 'required|string',
            'rek_number' => 'required|string',

            'link_website' => 'nullable|string',
            'nama_penanggung_jawab' => 'nullable|string',
            'posisi_penanggung_jawab' => 'nullable|string',
            'dokumen-legalitas' => 'nullable|file|mimes:pdf',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }

        DB::beginTransaction();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->save();

        $detail = $user->detail;

        if (!$detail) {
            $detail = new UserDetail;
            $detail->user_id = $user->id;
        }

        $detail->address = $request->address;
        $detail->village_id = $request->village_id;
        $detail->nik = $request->nik;
        $detail->birth_date = $request->birth_date;
        $detail->gender = $request->gender;
        $detail->address = $request->address;
        $detail->village_id = $request->village;
        $detail->status = 'processing';
        $detail->bank_name = $request->bank_name;
        $detail->rek_name = $request->rek_name;
        $detail->rek_number = $request->rek_number;
        $detail->link_website = $request->link_website;
        $detail->nama_penanggung_jawab = $request->nama_penanggung_jawab;
        $detail->posisi_penanggung_jawab = $request->posisi_penanggung_jawab;
        $detail->save();

        if($request->hasFile('foto')) {
            $foto = $user->photoProfile;
            if(!$foto){
                $foto = new UserImage();
                $foto->type = 'profile';
                $foto->user_id = $user->id;
            }else{
                $foto->deleteFile();
            }
            $path = '/user/profile';
            if (!File::exists(public_path('uploads' . $path))) {
                File::makeDirectory(public_path('uploads' . $path), 0777, true, true);
            }
            $fileName = time() . '.' . $request->file('foto')->extension();
            $file = $request->file('foto');

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

            $foto->path = $path . '/' . $fileName;
            $foto->save();
        }

        if($request->hasFile('ktp')) {
            if($ktp = UserDocument::where('user_detail_id', $detail->id)->where('type', 'ktp')->first()){
                $ktp->deleteFile();
            }else{
                $ktp = new UserDocument();
                $ktp->type = 'ktp';
                $ktp->user_detail_id = $detail->id;
            }
            $path = '/user-detail/ktp';
            if(!File::exists(public_path('uploads'. $path))){
                File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
            }
            $fileName = time().'.'.$request->file('ktp')->extension();
            $request->file('ktp')->move(public_path('uploads'. $path), $fileName);

            $ktp->path = $path . '/' . $fileName;
            $ktp->save();
        }

        if($request->hasFile('dokumen-legalitas')){
            if($legalitas = UserDocument::where('user_detail_id', $detail->id)->where('type', 'legalitas')->first()){
                $legalitas->deleteFile();
            }else{
                $legalitas = new UserDocument();
                $legalitas->type = 'legalitas';
                $legalitas->user_detail_id = $detail->id;
            }
            $path = '/user-detail/legalitas';
            if(!File::exists(public_path('uploads'. $path))){
                File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
            }
            $fileName = time().'.'.$request->file('dokumen-legalitas')->extension();
            $request->file('dokumen-legalitas')->move(public_path('uploads'. $path), $fileName);

            $legalitas->path = $path . '/' . $fileName;
            $legalitas->save();
        }

        DB::commit();

        return $this->setResponse(new UserResource($user));
    }

    public function userDetail(){
        $user = User::where('id', Auth::id())->with(['detail.documents', 'detail.village.district.regency.province', 'photoProfile'])->first();
        return $this->setResponse($user);
    }

}
