<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna memiliki peran yang sesuai
        if ($request->user() && $request->user()->jabatan == $role) {
            return $next($request);
        }

        // Jika tidak memiliki peran yang sesuai, arahkan ke halaman yang sesuai
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }

}
