<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthKasir
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('kasir')->check()) {
            return redirect()->route('kasir.login');
        }

        return $next($request);
    }
}
