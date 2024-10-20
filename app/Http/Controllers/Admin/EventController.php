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
        $items = Event::with('diamond', 'game_packages')->get();
        return view('pages.admin.events.index', compact('items'));
    }

    public function create()
    {
        // $topupgame_packages = TopupgamePackage::all();
        // return view('pages.admin.galleries.create', compact('topupgame_packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEvent($uuid)
    {
        $diamonds = Diamond::with(['game_packages'])->where('uuid', '=', $uuid)->firstOrFail();
        return view('pages.admin.product-packages.create-events', compact('diamonds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'uuid' => 'string|unique:events,uuid',
            'price' => 'required|numeric|min:0|max:100000000',
            'diamond_event' => 'nullable|integer',
            'game_id' => 'required|integer|exists:topupgame_packages,id',
            'diamond_id' => 'integer|exists:diamonds,id'
        ]);

        // 
        $gamePackage = TopupgamePackage::where('id', $request->game_id)->firstOrFail();
        if (!$gamePackage) {
            return redirect()->route('game-packages.index')->withErrors('Game Package not found');
        }
        $data['slug'] = Str::slug($gamePackage->name);
        $data['uuid'] = Str::uuid();

        // 
        $diamondPackage = Diamond::where('id', $request->diamond_id)->first();
        if (!$diamondPackage) {
            return redirect()->route('game-packages.index')->withErrors('Diamond Package not found');
        }

        // $data['price'] = $data['price'] ?? null;

        $existingEvent = Event::where('diamond_id', $diamondPackage->id)->first();

        if ($existingEvent) {
            $existingEvent->update(
                ['price' => $data['price'], 
                'diamond_event' => $data['diamond_event']]);
            Alert::success('Success', 'Data Berhasil Diperbarui');
            return redirect()->route('game-packages.index')->with('success', 'Data Event Berhasil Diperbarui');
        }

        Event::create($data);
        Alert::success('Success', 'Data Berhasil Ditambahkan');
        return redirect()->route('game-packages.index')->with('success', 'Data Event Berhasil Ditambahkan');
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
