<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RedirectIfNotFound
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah rute saat ini valid
        if (!Route::has($request->route()->getName())) {
            // Redirect ke halaman error atau halaman lain yang diinginkan
            return redirect()->route('error.page'); // Gantilah 'error.page' dengan rute halaman error Anda
        }

        return $next($request);
    }
}
