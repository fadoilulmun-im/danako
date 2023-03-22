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
            'password' => bcrypt($request->password)
        ]);
        $user->sendEmailVerificationNotification();
        DB::commit();
        
        return $this->setResponse(null, 'User created successfully');
    }
}
