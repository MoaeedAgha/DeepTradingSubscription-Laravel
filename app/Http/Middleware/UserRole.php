<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->route()->getPrefix() == '/user' && Auth::user() && Auth::user()->Role == 'user') {
            return $next($request);
        } else if($request->route()->getPrefix() == '/admin' && Auth::user() && Auth::user()->Role == 'admin') {
            return $next($request);
        } else if($request->route()->getName()) {
            return redirect()->route('login');
        }
    }
}
