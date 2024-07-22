<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Admin\Category;
use App\Models\TopupgamePackage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Category::with(['topupgame_package'])->get();
      
        // return view('pages.topup-game-package.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topupgame_package = TopupgamePackage::all();
        return view('pages.topup-game-package.create',['topupgame_packages' => $topupgame_package]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $item = $request->all();
        Category::create($item);
        
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
