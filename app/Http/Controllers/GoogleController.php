<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->getId())->first();

        if (!$finduser) {
            $finduser = User::create([
                'name' => $user->getName(),
                'username' => Str::slug($user->getName()),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt(config('env.default_password')),
                'role_id' => 2
            ]);
        }

        // Auth::login($newuser);
        // return redirect()->intended('user');

        return view('landing.login', ['access_token' => $finduser->createToken($finduser->username)->plainTextToken]);
    }
}
