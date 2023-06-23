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
        if ($request->user() && $request->user()->jabatan == 'manajemen') {
            # code...
            return redirect()->route('dashboard.manajemen')->with('error', 'Unauthorized access');
        }
        if ($request->user() && $request->user()->jabatan == 'pegawai') {
            # code...
            return redirect()->route('dashboard.pegawai')->with('error', 'Unauthorized access');
        }
        // Jika tidak memiliki peran yang sesuai, arahkan ke halaman yang sesuai
    }

}
