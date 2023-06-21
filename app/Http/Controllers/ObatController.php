<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return DataTables::of(Obat::all())
                ->addIndexColumn()
                ->addColumn('action', 'layout.button.edit')
                ->make(true);
        }
        return view('master.obat');
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
            'nama_obat' => 'required',
        ]);

        $obat = Obat::create($validatedData);

        // Lakukan tindakan lain setelah penyimpanan obat
        
        return back()->with(['success' => 'Obat berhasil disimpan']);
   
    }

    /**
     * Display the specified resource.
     */
    public function show($obat)
    {
        //
        $obat = Obat::find($obat);
        return  response()->json($obat, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $obat)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required',
        ]);

        $obat = Obat::findOrFail($obat);
        $obat->nama_obat = $validatedData['nama_obat'];
        $obat->save();

        // Lakukan tindakan lain setelah pembaruan obat

        return back()->with(['success' => 'Obat berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
    }
}
