<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $req)
    {
        $credentials = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            if (Auth::user()->username=='staff') {
                return redirect()->route('chat.index');
            }
            switch (Auth::user()->jabatan) {
                case 'pegawai':
                    return redirect()->route('dashboard.pegawai');
                default:
                    return redirect()->route('dashboard.manajemen');
            }
        }

        return back()->withErrors([
            'status' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/login');
    }
}
