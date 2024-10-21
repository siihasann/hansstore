<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // Pastikan pengguna terautentikasi dan merupakan admin
        if (!Auth::check() || Auth::user()->user_role !== 'admin') {
            // Jika tidak, redirect ke halaman dashboard atau halaman lain
            return redirect('/');
        }

        if ($request->routeIs('dashboard')) {
            return redirect()->route('admin.dashboard')->with('info', 'Admin redirected to admin dashboard.');
        }

        return $next($request);
    }
}
