<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|string|unique:users,username|alpha_dash|min:3',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        $user = User::create([
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'role_id' => config('env.role.user'),
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

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        }

        $credentials = array_merge(request(['username', 'password']), ['role_id' => config('env.role.user')]);
        if (!auth()->attempt($credentials)) {
            return $this->setResponse(null, 'Username or Password Wrong', 401);
        }

        $user = auth()->user();
        if (!$user->hasVerifiedEmail()) {
            return $this->setResponse(null, 'Email not verified', 401);
        }

        return $this->setResponse([
            'access_token' => $user->createToken($user->username)->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => config('sanctum.expiration') ? Carbon::parse(
                config('sanctum.expiration')
            )->toDateTimeString() : null
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->setResponse(null, 'Logout successfully');
    }
}
