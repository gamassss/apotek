<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            if (Auth::user()->jabatan=='Pegawai') {
                $transaksi = DB::table('transaksis as t')
                ->join('members as m','m.id','=','t.member_id')
                ->join('obats as o','o.id','=','t.obat_id')
                ->select('t.lama_habis','m.nama_member','o.nama_obat','t.created_at as tanggal_beli')
                ->where('user_id',Auth::user()->id)
                ->get();
            }else{
                $transaksi = DB::table('transaksis as t')
                ->join('members as m','m.id','=','t.member_id')
                ->join('users as u','u.id','=','m.user_id')
                ->join('obats as o','o.id','=','t.obat_id')
                ->select('t.lama_habis','m.nama_member','o.nama_obat','t.created_at as tanggal_beli','u.name as nama_pegawai')
                ->get();
            }
            return DataTables::of($transaksi)
            ->addIndexColumn()
            ->make(true);
        }
        $member = Member::where('user_id',Auth::user()->id)->get();
        $obat= Obat::all();
        return view('transaksi.transaksi',compact('member','obat'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validasi request data
         $validatedData = $request->validate([
            'member_id' => 'required|integer',
            'obat_id' => 'required|integer',
            'lama_habis' => 'required|integer',
        ]);

        $memberId = $validatedData['member_id'];

        // Hitung jumlah transaksi member dalam satu bulan
        $transaksi = Transaksi::where('member_id', $memberId)
            ->whereMonth('created_at', Carbon::now()->month)->get();
        if($transaksi->where('obat_id',$validatedData['obat_id'])->count()>=1){
            
            return back()->with(['error' => 'Batas pemesanan sudah tercapai.'], 422);
        }
        if ($transaksi->count() >= 3) {
            // Member sudah mencapai batas transaksi dalam satu bulan
            return back()->with(['error' => 'Batas transaksi bulanan sudah tercapai.'], 422);
        }
        
        // Simpan data transaksi baru
        try {
            Transaksi::create($validatedData);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'Terjadi Kesalahan.'], 422);
            //throw $th;
        }

        return back()->with(['success' => 'Transaksi berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
