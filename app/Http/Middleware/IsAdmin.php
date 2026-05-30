<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next, string $role): Response
    {
        // 1. Cek apakah user sudah login?
        // 2. Cek apakah properti role milik user yang sedang login sama dengan role yang diminta route?
        if (!Auth::check() || Auth::user()->role !== $role) {
            
            // Jika request meminta JSON (seperti dari Postman), kembalikan respon JSON yang rapi
            if ($request->wantsJson() || $request->expectCustomJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Forbidden - Khusus untuk role ' . $role
                ], 403);
            }

            // Jika diakses dari browser biasa, lempar ke halaman error 403
            abort(403, 'Forbidden - ' . ucfirst($role) . ' Only');
        }

        return $next($request);
    }
}
