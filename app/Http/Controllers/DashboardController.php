<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    function indexPegawai() {
        $jumlahMemberTotal= Member::where('user_id',Auth::user()->id)->count();
        $jumlahTransaksiTotal= DB::table('transaksis as t')
        ->join('members as m','m.id','t.member_id')
        ->join('users as u','u.id','m.user_id')
        ->count();
        return view('dashboard-pegawai',compact('jumlahMemberTotal','jumlahTransaksiTotal'));
    }
    function indexManajemen() {
        return view('dashboard-manajemen');
    }
}
