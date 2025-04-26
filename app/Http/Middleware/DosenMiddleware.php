<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DosenMiddleware
{
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->level == 4) {
            return $next($request);
        }
        return redirect('/');
    }
}

