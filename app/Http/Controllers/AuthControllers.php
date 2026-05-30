<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class AuthControllers extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function showRegisterForm()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|min:5|max:50',
                'password' => 'required|min:8|max:32',
            ], [
                'username.min' => 'Username minimal harus berjumlah 5 karakter.',
                'username.max' => 'Username maksimal tidak boleh melebihi 50 karakter.',
                'password.min' => 'Password minimal harus berjumlah 8 karakter.',
                'password.max' => 'Password maksimal tidak boleh melebihi 32 karakter.',
            ]);
        } catch (ValidationException $e) {
            // Mengembalikan HTTP Status 422 Unprocessable Entity jika melanggar batas (BVA-U01)
            return back()->withErrors($e->validator)->withInput();
        }
        // 2. Cari user berdasarkan username dan password teks biasa (Plain Text)
        $user = User::where('username', $request->username)->first();
        if (!$user || $request->password !== $user->password) {
            return back()->withErrors([
                'login_error' => 'Kredensial salah. Username atau password tidak cocok.'
            ])->withInput();
        }
        if ($user){
            Auth::login($user);
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
            }
        }

        public function apiLogin(Request $request)
    {
        // 1. Validasi format input dari Postman
        $request->validate([
            'username' => 'required|min:5|max:50',
            'password' => 'required|string',
        ],
        [
                'username.min' => 'Username minimal harus berjumlah 5 karakter.',
                'username.max' => 'Username maksimal tidak boleh melebihi 50 karakter.',
                'password.min' => 'Password minimal harus berjumlah 8 karakter.',
                'password.max' => 'Password maksimal tidak boleh melebihi 32 karakter.',
            ]);

        // 2. Cari data fungsionaris berdasarkan username
        $user = User::where('username', $request->username)->first();

        // 3. Cek eksistensi user dan kecocokan password BCrypt
        if (!$user || $request->password !== $user->password) {
            return back()->withErrors([
                'status'  => 'error',
                'login_error' => 'Kredensial salah. Username atau password tidak cocok.'
            ])->withInput();
        }

        // 4. Hapus token lama jika ada (opsional, biar tidak menumpuk di DB)
        $user->tokens()->delete();

        // 5. Generate plain text token baru lewat Laravel Sanctum
        $token = $user->createToken('deco_session_token')->plainTextToken;

        // 6. Kembalikan respons sukses beserta tokennya
        return response()->json([
            'status'  => 'success',
            'message' => 'Autentikasi berhasil! Gunakan token ini pada header Postman.',
            'token'   => $token,
            'user'    => [
                'id'       => $user->id,
                'username' => $user->username,
                'email'    => $user->email,
                'role'     => $user->role
            ]
        ], 200);
    }
    public function register(Request $request)
    {
        // 1. Validasi input form HTML
        $request->validate([
            'username' => 'required|string|alpha_dash|max:255|unique:users,username',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8', // Wajib ada input password_confirmation
            'role'     => 'staf',
        ]);

        // 2. Insert data ke database dengan password terenkripsi Bcrypt
        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => $request->role,
        ]);
        // 3. Otomatis login (Session-based untuk HTML/Blade)
        Auth::login($user);
        // 4. Lempar fungsionaris ke halaman dashboard utama
        return redirect('/dashboard')->with('success', 'Akun fungsionaris berhasil terdaftar!');
    }

    public function logout(Request $request)
    {
        // 1. Bersihkan session login user dari guard Laravel
        Auth::logout();
        // 2. Hancurkan data session yang tersimpan di server
        $request->session()->invalidate();
        // 3. Regenerasi token CSRF baru demi keamanan agar tidak bisa di-hijack
        $request->session()->regenerateToken();
        // 4. Lempar kembali ke halaman login atau landing page depan
        return redirect('/login')->with('success', 'Anda telah berhasil keluar dari sistem De-Co.');
    }
}