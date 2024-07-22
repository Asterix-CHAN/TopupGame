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

        $items = TopupgamePackage::paginate(10);
        return view('pages.admin.topup-game-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $items = TopupgamePackage::all();
        
        // return redirect()->route('topup-package', $items);
    }

    /**
     * Store a newly created resource in storage.
     */

    
    public function store(TopupgamePackageRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/gallery', 'public');
            $data['image'] = $imagePath;
        }
    
        TopupgamePackage::create($data);
    
        return redirect()->back();
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
        $item = TopupgamePackage::findOrFail($id);

        return view('pages.admin.topup-game-package.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'name' => 'required|max:255',
            'developer' => 'required|max:255',
            'description' => 'required|max:255',
            'about' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|max:255',
            'category' => 'required|max:255',
            'platform' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $data['slug'] = Str::slug($request->name);
        
        // Check if the image file exists in the request
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/gallery', 'public');
            $data['image'] = $imagePath;
        }
        
        $item = TopupgamePackage::findOrFail($id);
        $item->update($data);

        return redirect()->route('topup-package.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = TopupgamePackage::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
