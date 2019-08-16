<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!auth()->check())
            return redirect()->route('login');

        if (!auth()->user()->isAdmin())
            return redirect()->route('login');

        return $next($request);
    }
}