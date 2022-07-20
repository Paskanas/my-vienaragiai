<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role === 'admin') {
            if (($request->user()?->role ?? 0) < 10) {
                abort(401, 'You do not have access');
            }
        }
        if ($role === 'user') {
            if (($request->user()?->role ?? 0) < 1) {
                abort(401, 'You are not loged in');
            }
        }

        return $next($request);
    }
}
