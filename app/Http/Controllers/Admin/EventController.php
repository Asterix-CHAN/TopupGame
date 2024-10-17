<?php

namespace App\Http\Controllers\Admin;


use App\Models\Event;

use App\Models\Diamond;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = Diamond::with([ 'game_packages'])->findOrFail($id);
        return view('pages.admin.product-packages.create-events', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'price' => 'required|numeric|min:0|max:100000000',
            'diamond_event' => 'integer',
            'game_id' => 'required|integer|exists:topupgame_packages,id',
            'diamond_id' => 'integer|exists:diamonds,id'
        ]);

        $gamePackage = TopupgamePackage::findOrFail($request->game_id);
        $data['slug'] = Str::slug($gamePackage->name);

          // If diamond_id is not provided, set it to null
        $data['diamond_id'] = $request->diamond_id ?? null;

        Event::create($data);

        Alert::success('Success', 'Data Berhasil Ditambahkan');
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
