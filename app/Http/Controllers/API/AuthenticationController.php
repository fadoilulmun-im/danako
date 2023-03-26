<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;

use App\Models\User;
use Nette\Utils\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->setResponse(null, 'Logout successfully');
    }

    public function me(Request $request)
    {
        return $this->setResponse(Auth::user());
    }
}
