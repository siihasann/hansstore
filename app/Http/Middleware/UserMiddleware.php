<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        {

            if (!Auth::check() || Auth::user()->user_role !== 'user') {
                return redirect('/admin/dashboard')->with('error', 'Admins are not allowed to access user dashboard!');
            }
            return $next($request);
        }

        return $next($request);
    }
}
