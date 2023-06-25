<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            $user = DB::table('users')
            ->select('id','name','username','no_telpon')
            ->where('jabatan','pegawai')
            ->get();
            return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action','layout.button.action-pegawai')
            // ->rawColumn(['action'])
            ->make(true);
        }
        return view('master.pegawai');
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
         $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required|',
            'no_telpon' => 'required|numeric',
        ]);
        $validatedData['password']= bcrypt('12345678');
        $validatedData['jabatan']= 'pegawai';
        User::create($validatedData);
        return back()->with('success','Transaksi berhasil disimpan.');
    }

    function viewProfilePegawai($username) {
        $user = User::where('username',$username)->select()->first();
        $jumlahMemberTotal= Member::where('user_id',$user->id)->count();
        $query = DB::table('transaksis as t')
        ->join('members as m', 'm.id', '=', 't.member_id')
        ->join('users as u', 'u.id', '=', 'm.user_id')
        ->where('m.user_id', $user->id)
        ->select(DB::raw('COUNT(*) as totalTransactions'), DB::raw('YEAR(t.created_at) as year'))
        ->groupBy('year')
        ->get(); 
        $jumlahTransaksiTotal = $query->sum('totalTransactions');
        $tahunTransaksi = $query->pluck('year')->toArray();
        $tahunMember = DB::table('members as m')
        ->select(DB::raw('YEAR(m.created_at) as year'))
        ->where('user_id',$user->id)
        ->groupBy('year')
        ->get();
        return view('master.profile-pegawai',compact('user','jumlahMemberTotal','jumlahTransaksiTotal','tahunTransaksi','tahunMember'));
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
