<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MahasiswaMiddleware
{
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->level == 3) {
            return $next($request);
        }
        return redirect('/');
    }
}
