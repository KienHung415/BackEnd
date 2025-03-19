<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateNguoiDung
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('nguoidung')->check()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}