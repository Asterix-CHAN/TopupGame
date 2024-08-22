<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;


use App\Models\Platform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\TopupgamePackageRequest;


class TopupgamePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $platforms = Platform::with(['topup'])->get();
        $items = TopupgamePackage::with(['platform_name'])->get();
       
        // sweetAlert Delete message
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('pages.admin.topup-game-package.index', compact('items', 'categories', 'platforms'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all(); 
        // return view('pages.admin.topup-game-package.index', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     */

    // public function store(TopupgamePackageRequest $request)
    // {
    //     $data = $request->all();
    //     $data['slug'] = Str::slug($request->name);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('assets/gallery', 'public');
    //         $data['image'] = $imagePath;
    //     }

       
    //         $items = TopupgamePackage::create($data);
    //         // create data topupgame and categories to pivot table
    //         $items->categories()->attach($request->category_id);

    //         Alert::success('Success Title', 'Success Message');
    //         return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
        
        
    // }


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
        $item = TopupgamePackage::with(['platform_name'])->findOrFail($id);
        $platforms = Platform::all();
        $categories = Category::all();
        return view('pages.admin.topup-game-package.edit', compact('item', 'categories', 'platforms'));
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
            'category_id' => 'required|array|min:1',
            'category_id.*' => 'required|integer|exists:categories,id',
            'platform_id' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data['slug'] = Str::slug($request->name);

        // Check if the image file exists in the request
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/gallery', 'public');
            $data['image'] = $imagePath;
        }

        $item = TopupgamePackage::findOrFail($id);
        $item->update($data);
        $item->categories()->sync($request->category_id);
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('topup-package.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = TopupgamePackage::findOrFail($id);
            $item->delete();
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->with('success', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
