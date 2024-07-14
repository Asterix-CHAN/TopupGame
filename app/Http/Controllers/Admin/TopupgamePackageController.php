<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TopupgamePackageRequest;

class TopupgamePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = TopupgamePackage::all();
        return view('pages.topup-game-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.topup-game-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopupgamePackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        TopupgamePackage::create($data);
        return redirect()->route('topup-package.index');
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
