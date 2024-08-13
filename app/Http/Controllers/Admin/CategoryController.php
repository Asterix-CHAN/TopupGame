<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.admin.category.index', [
            'datas' => $data
        ]);
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
        $validated = $request->validate([
            'name' => 'required|string|max:10',
            // 'platform' => 'required|string|min:2|max:20'

        ]);

        // Generate the slug
        // $validated['slug'] = Str::slug($request->name);
        try {
            Category::create($validated);
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            Alert::success('Error Title', 'Error Message');
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
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
        $data = Category::findOrFail($id);
        $topupgame_packages = TopupgamePackage::all();
        // $topupgame_packages = TopupgamePackage::where('id', $data->id)->first();
        // dd($topupgame_packages);
        return view('pages.admin.category.edit', ['datas' => $data, 'game' => $topupgame_packages]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:10'
        ]);

        // Generate the slug
        // $validated['slug'] = Str::slug($request->name);
        try {
            
            $data->update($validated);
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            Alert::success('Error Title', 'Error Message');
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
