<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->level == 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
