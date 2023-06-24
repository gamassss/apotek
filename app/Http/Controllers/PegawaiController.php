<?php

namespace App\Http\Controllers;

use App\Models\User;
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
