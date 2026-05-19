<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::User()->isAdmin()) {
            abort(403, 'Forbidden - Admin Only');
        }

        return $next($request);
    }
}
