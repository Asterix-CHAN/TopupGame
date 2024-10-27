<?php

namespace App\Http\Controllers\Admin;


use App\Models\Diamond;


use App\Models\Category;
use App\Models\Platform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductPackage;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\TopupgamePackageRequest;
use App\Models\Event;

class TopupgamePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $platforms = Platform::with(['topup'])->get();
        $items = TopupgamePackage::with(['platform_name'])->paginate(10);

        // sweetAlert Delete message
        $title = 'Delete Produk Game!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.admin.topup-game-package.index', compact('items', 'categories', 'platforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id) {}

    /**
     * Store a newly created resource in storage.
     */

    public function store(TopupgamePackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['uuid'] = Str::uuid();

        // 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/gallery', 'public');
            $data['image'] = $imagePath;
        }

        // 
        $existName = TopupgamePackage::where('name', $data['name'])->exists();
        if ($existName) {
            Alert::error('Error', 'Product Name already exists');
            return redirect()->back()->withInput()->with('error', 'Product Name already exists');

        }

        // 
        $items = TopupgamePackage::create($data);
        // create data topupgame and categories to pivot table
        $items->categories()->attach($request->category_id);

        Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $items = TopupgamePackage::where('slug',$slug)->firstOrFail();
        
        $diamonds = Diamond::with('game_packages')->where('slug', $slug)->get();
        $events = Event::with('game_packages')->where('slug', $slug)->get();
      
        return view('pages.admin.topup-game-package.show-products', compact('items', 'diamonds', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $item = TopupgamePackage::with(['platform_name'])->where('uuid',$uuid)->firstOrFail();
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
            'name' => 'string|max:255',
            'developer' => 'string|max:255',
            'description' => 'text|max:255',
            'about' => 'longText|max:255',
            'category_id' => 'array|min:1',
            'category_id.*' => 'integer|exists:categories,id',
            'platform_id' => 'integer|max:255',
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
        return redirect()->route('game-packages.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
            $item = TopupgamePackage::where('uuid', $uuid)->first();
            $item->delete();
                Alert::success('Success Title', 'Success Message');
                return redirect()->back()->with('success', 'Data Berhasil dihapus');
            }
}
