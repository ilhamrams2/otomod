<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanggananMiddleware
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
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has status_id 1
            if ($user->status_id == 1) {
                // Check if the requested berita exists and has status_id 2
                if ($request->route('id')) {
                    $berita = Berita::findOrFail($request->route('id'));

                    if ($berita->status_id == 2) {
                        // Redirect back with error message
                        return redirect()->back()->with(['warning' => 'Anda tidak memiliki izin untuk mengakses berita eksklusif.']);
                    }
                }
            }
        }

        return $next($request);
    }
}
