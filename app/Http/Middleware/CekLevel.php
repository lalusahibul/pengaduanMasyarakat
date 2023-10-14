<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$levels
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // Mengakses pengguna yang masuk menggunakan guard 'masyarakat'
        // $user = Auth::guard('petugas')->user();

        if ($levels === 'admin' && Auth::guard('petugas')->check()) {
            return $next($request);
        } elseif ($levels === 'petugas' && Auth::guard('petugas')->check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
