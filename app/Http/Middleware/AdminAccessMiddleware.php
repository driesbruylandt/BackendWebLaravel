<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin==1) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
