<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // 1. Cek apakah user sudah terdaftar di database lo
            $user = User::where('email', $googleUser->email)->first();

            // 2. Gembok Whitelist: Jika email TIDAK ditemukan di database, tolak aksesnya!
            if (!$user) {
                return redirect()->route('login')->withErrors([
                    'email' => 'Akses ditolak! Email Anda belum terdaftar di sistem admin sekolah. Silakan hubungi Super Admin.'
                ]);
            }

            // 3. Jika email terdaftar, langsung login-kan ke dashboard admin
            Auth::login($user);
            
            return redirect()->intended(route('admin.dashboard'));

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Gagal melakukan login menggunakan Google atau koneksi terputus.'
            ]);
        }
    }
}