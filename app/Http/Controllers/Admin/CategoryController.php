<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Platform;
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
        $data = Category::paginate(10);
        $item = Platform::paginate(10);
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.admin.category.index', [
            'datas' => $data,'items' => $item
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
        return view('pages.admin.category.edit', ['datas' => $data]);
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
        $data->update($validated);
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('category.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }
}
