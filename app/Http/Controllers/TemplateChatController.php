<?php

namespace App\Http\Controllers;

use App\Models\TemplateChat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TemplateChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return DataTables::of(TemplateChat::all())
                ->addIndexColumn()
                ->addColumn('action', 'layout.button.edit')
                ->make(true);
        }
        return view('master.template-chat');
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
            'text' => 'required',
        ]);
    
        $templateChat = new TemplateChat();
        $templateChat->text = $validatedData['text'];
        $templateChat->save();
        return back()->with(['success' => 'Obat berhasil disimpan']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $templateChat = TemplateChat::find($id);
        if (!$templateChat) {
            return response()->json(['message' => 'TemplateChat not found'], 404);
        }
    
        return response()->json($templateChat, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $templateChat)
    {
        //
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $validatedData = $request->validate([
            'text' => 'required',
        ]);
    
        $templateChat = TemplateChat::find($id);
        if (!$templateChat) {
            return response()->json(['message' => 'TemplateChat not found'], 404);
        }
    
        $templateChat->text = $validatedData['text'];
        $templateChat->save();
        return back()->with(['success' => 'Obat berhasil disimpan']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateChat $templateChat)
    {
        //
    }
}
