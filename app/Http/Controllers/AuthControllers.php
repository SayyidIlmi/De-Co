<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthControllers extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cari user berdasarkan email dan password teks biasa (Plain Text)
        $user = \App\Models\User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            // Jika user ditemukan, login-kan secara manual
            Auth::login($user);

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // 3. Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah (Plain Text Mode).',
        ])->onlyInput('email');
    }
}