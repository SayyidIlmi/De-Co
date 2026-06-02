<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
        return redirect()->route('login');
    }

    // 2. Cek apakah role user saat ini ada di dalam parameter middleware (misal: koordinator)
    if (in_array(auth()->user()->role, $roles)) {
        return $next($request);
    }

    // 3. JIKA GAGAL LOLOS ROLE (Skenario pencegatan):
    // 💡 Ganti dengan fungsi expectsJson() bawaan Laravel yang benar
    if ($request->expectsJson()) {
        return response()->json(['message' => 'Akses ditolak, Anda bukan Koordinator!'], 403);
    }

    // Jika diakses via browser biasa, lempar balik ke dashboard dengan pesan peringatan
    return redirect()->route('dashboard')->with('error', 'Akses ditolak, Anda bukan Koordinator!');
    }
}
