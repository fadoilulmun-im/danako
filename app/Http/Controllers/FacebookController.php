<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('facebook_id', $user->getId())->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect()->intended('user');
        } else {
            $newuser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'facebook_id' => $user->getId(),
                'password' => bcrypt('1234242'),
                'role_id' => 2
            ]);
        }

        Auth::login($newuser);
        return redirect()->intended('user');
    }
}
