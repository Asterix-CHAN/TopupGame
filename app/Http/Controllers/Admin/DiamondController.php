<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diamond;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Diamond::with('game_packages')->get();
        // sweetAlert Delete message
        $title = 'Delete Diamond!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('pages.admin.product-packages.index', compact('items'));
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
        
        $data = $request->validate([
            'price' => 'required|integer',
            'diamond' => 'required|integer',
            'game_id' => 'required|integer|exists:topupgame_packages,id',
        ]);

        $gamePackage = TopupgamePackage::findOrFail($request->game_id);
        $data['slug'] = Str::slug($gamePackage->name);
        
        Diamond::create($data);
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('game-packages.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
