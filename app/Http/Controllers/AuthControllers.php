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
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // 2. Cari user berdasarkan username dan password teks biasa (Plain Text)
        $user = \App\Models\User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            // Jika user ditemukan, login-kan secara manual
            Auth::login($user);

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // 3. Jika gagal
        return back()->withErrors([
            'username' => 'username atau password salah.',
        ])->onlyInput('username');
    }
}