<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function indexPegawai() {
        return view('dashboard-pegawai');
    }
    function indexManajemen() {
        return view('dashboard-manajemen');
    }
}
