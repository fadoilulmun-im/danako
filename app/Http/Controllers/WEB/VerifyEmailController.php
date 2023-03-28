<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verify($id, Request $request) {
        try {
            $id = intval($id);

            if (!$request->hasValidSignature()) {
                $status = 'no';
                $message = 'Invalid/Expired url provided';
            
                return view('verifyEmail', compact('message', 'status'));
            }
        
            $user = User::find($id);

            if (empty($user)) {
                $status = 'no';
                $message = 'Akun tidak ditemukan';
            
                return view('verifyEmail', compact('message', 'status'));
            }
        
            if ($user->hasVerifiedEmail()) {
                $status = 'no';
                $message = 'Akun sudah terverifikasi';
            
                return view('verifyEmail', compact('message', 'status'));
            }

            $user->markEmailAsVerified();

            $status = 'ok';
            $message = 'Akun berhasil diverifikasi, silahkan login menggunakan USERNAME/EMAIL dan PASSWORD anda';
        
            return view('verifyEmail', compact('message', 'status'));
        } catch (\Exception $e) {
            $status = 'no';
            $message = $e->getMessage();
        
            return view('verifyEmail', compact('message', 'status'));
        }
    }
}
