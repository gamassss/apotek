<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return DataTables::of(Member::all())
                ->addIndexColumn()
                ->addColumn('action', 'layout.button.edit')
                ->make(true);
        }
        return view('master.member');
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

        $member = Member::create($validatedData);

        // Lakukan tindakan lain setelah penyimpanan member

        return back()->with(['success' => 'Member berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
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
        ]);
    
        try {
            $member = Member::findOrFail($id);
            $member->update($validatedData);
            return back()->with(['success' => 'Member successfully updated']);
        } catch (ModelNotFoundException $e) {
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
