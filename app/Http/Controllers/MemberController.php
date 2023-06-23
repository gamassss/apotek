<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $member;
            if(Auth::user()->jabatan=='pegawai'){
              $member = Member::where('user_id',Auth::user()->id)->get();
            }
            if (Auth::user()->jabatan=='manajemen') {
                # code...
                $member = Member::all();
            }
            return DataTables::of($member)
                ->addIndexColumn()
                ->addColumn('name',function ($member) {
                    if(isset($member->user->name)){
                        return $member->user->name;
                    }else{
                        return 'Belum Dipasangkan';
                    }
                })
                ->addColumn('action', 'layout.button.edit')
                ->make(true);
        }
        $pegawai = User::where('jabatan','pegawai')->get();
        return view('master.member',compact('pegawai'));
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
        //
        $validatedData = $request->validate([
            'nama_member' => 'required',
            'alamat_member' => 'required',
            'no_telpon' => 'required|numeric',
        ]);
        if(Auth::user()->jabatan=='pegawai'){
            $validatedData['user_id']=Auth::user()->id;
        }else{
            if (isset($request->nama_pegawai)) {
                $validatedData['user_id']=$request->nama_pegawai;
            }
        }
        try {
            //code...
            $member = Member::create($validatedData);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' => 'Terjadi Kesalahan']);
        }
        
        // Lakukan tindakan lain setelah penyimpanan member

        return back()->with(['success' => 'Member berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Member::with('user')->findOrFail($id);
        return response()->json($member);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'nama_member' => 'required',
            'alamat_member' => 'required',
            'no_telpon' => 'required|numeric',
            'user_id'=>'required|numeric'
        ]);
    
        try {
            $member = Member::findOrFail($id);
            $member->update($validatedData);
            return back()->with(['success' => 'Member successfully updated']);
        } catch (\Throwable $e) {
            return back()->with(['error' => 'Member not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
