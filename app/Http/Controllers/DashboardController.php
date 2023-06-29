<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // pegawai
    function indexPegawai() {
        $jumlahMemberTotal= Member::where('user_id',Auth::user()->id)->count();
        $query = DB::table('transaksis as t')
        ->join('members as m', 'm.id', '=', 't.member_id')
        ->join('users as u', 'u.id', '=', 'm.user_id')
        ->where('m.user_id', Auth::user()->id)
        ->select(DB::raw('COUNT(*) as totalTransactions'), DB::raw('YEAR(t.created_at) as year'))
        ->groupBy('year')
        ->get(); 
        $jumlahTransaksiTotal = $query->sum('totalTransactions');
        $tahunTransaksi = $query->pluck('year')->toArray();
        $tahunMember = DB::table('members as m')
        ->select(DB::raw('YEAR(m.created_at) as year'))
        ->where('user_id',Auth::user()->id)
        ->groupBy('year')
        ->get();
        return view('dashboard-pegawai',compact('jumlahMemberTotal','jumlahTransaksiTotal','tahunTransaksi','tahunMember'));
        
    }

  function peningkatanMemberPegawaiMonthly(Request $request) {
    $currentYear = $request->year;
    if(isset($request->user)) {
      $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
      ->whereYear('created_at', $currentYear)
      ->where('user_id',$request->user)
      ->groupBy('month')
      ->orderByRaw("MONTH(created_at)")
      ->get();
    }else{
    $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
    ->whereYear('created_at', $currentYear)
    ->where('user_id',Auth::user()->id)
    ->groupBy('month')
    ->orderByRaw("MONTH(created_at)")
    ->get();
    }
    $bulan = $monthlyData->pluck('month')->toArray();
    $dataBulanan = $monthlyData->pluck('count')->toArray();
    return response()->json(['month'=>$bulan,'dataBulanan'=>$dataBulanan]);
  }
 
  function peningkatanMemberPegawaiYearly(Request $request) {
    if(isset($request->user)) {
    $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
    ->where('user_id',$request->user)
    ->groupBy('year')
    ->orderByRaw("YEAR(created_at)")
    ->get();
  }else{
      $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
      ->where('user_id',Auth::user()->id)
      ->groupBy('year')
      ->orderByRaw("YEAR(created_at)")
      ->get();
    }
    $year = $yearlyData->pluck('year')->toArray();
    $dataTahunan = $yearlyData->pluck('count')->toArray();
    return response()->json(['year'=>$year,'dataTahunan'=>$dataTahunan]);
  }
  function peningkatanTransaksiPegawaiYearly(Request $request) {
    
    if(isset($request->user)) {
    $yearlyData = DB::table('transaksis as t')
    ->join('members as m','m.id','t.member_id')
    ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
    ->where('m.user_id',$request->user)
    ->groupBy('year')
    ->orderByRaw("YEAR(t.created_at)")
    ->get();
  }else{
      $yearlyData = DB::table('transaksis as t')
      ->join('members as m','m.id','t.member_id')
      ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
      ->where('m.user_id',Auth::user()->id)
      ->groupBy('year')
      ->orderByRaw("YEAR(t.created_at)")
      ->get();
    }
    $year = $yearlyData->pluck('year')->toArray();
    $dataTahunan = $yearlyData->pluck('count')->toArray();
    return response()->json(['year'=>$year,'dataTahunan'=>$dataTahunan]);
  }
  function peningkatanTransaksiPegawaiMonthly(Request $request) {
    $currentYear = $request->year;
    if(isset($request->user)) {
    $monthlyData =  DB::table('transaksis as t')
    ->join('members as m','m.id','t.member_id')
    ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
    ->whereYear('t.created_at', $currentYear)
    ->where('m.user_id',$request->user)
    ->groupBy('month')
    ->orderByRaw("MONTH(t.created_at)")
    ->get();
  }else{
      $monthlyData =  DB::table('transaksis as t')
      ->join('members as m','m.id','t.member_id')
      ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
      ->whereYear('t.created_at', $currentYear)
      ->where('m.user_id',Auth::user()->id)
      ->groupBy('month')
      ->orderByRaw("MONTH(t.created_at)")
      ->get();

    }
    $bulan = $monthlyData->pluck('month')->toArray();
    $dataBulanan = $monthlyData->pluck('count')->toArray();
    return response()->json(['month'=>$bulan,'dataBulanan'=>$dataBulanan]);
  }


    // manajemen
    function indexManajemen() {
        $jumlahMemberTotal= Member::count();
        $query = DB::table('transaksis as t')
        ->join('members as m', 'm.id', '=', 't.member_id')
        ->join('users as u', 'u.id', '=', 'm.user_id')
        ->select(DB::raw('COUNT(*) as totalTransactions'), DB::raw('YEAR(t.created_at) as year'))
        ->groupBy('year')
        ->get(); 
        $jumlahTransaksiTotal = $query->sum('totalTransactions');
        $tahunTransaksi = $query->pluck('year')->toArray();
        $tahunMember = DB::table('members as m')
        ->select(DB::raw('YEAR(m.created_at) as year'))
        ->groupBy('year')
        ->get();
        return view('dashboard-manajemen',compact('jumlahMemberTotal','jumlahTransaksiTotal','tahunTransaksi','tahunMember'));
        
    }
    function peningkatanMemberMonthly(Request $request) {
        $currentYear = $request->year;
        $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->orderByRaw("MONTH(created_at)")
        ->get();
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month'=>$bulan,'dataBulanan'=>$dataBulanan]);
      }
      function peningkatanMemberYearly() {
        
        $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
        ->groupBy('year')
        ->orderByRaw("YEAR(created_at)")
        ->get();
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year'=>$year,'dataTahunan'=>$dataTahunan]);
      }
      function peningkatanTransaksiYearly() {
    
        $yearlyData = DB::table('transaksis as t')
        ->join('members as m','m.id','t.member_id')
        ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
        ->groupBy('year')
        ->orderByRaw("YEAR(t.created_at)")
        ->get();
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year'=>$year,'dataTahunan'=>$dataTahunan]);
      }
      function peningkatanTransaksiMonthly(Request $request) {
        $currentYear = $request->year;
        $monthlyData =  DB::table('transaksis as t')
        ->join('members as m','m.id','t.member_id')
        ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
        ->whereYear('t.created_at', $currentYear)
        ->groupBy('month')
        ->orderByRaw("MONTH(t.created_at)")
        ->get();
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month'=>$bulan,'dataBulanan'=>$dataBulanan]);
      }
      public function resetPassword() 
      {
        return view('reset-password-pegawai');
      }
}
