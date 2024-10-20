<?php

namespace App\Http\Controllers\Admin;

use App\Models\Platform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Platform::paginate(10);
        return view('pages.admin.category.index', [

            'items' => $item
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
        $data = $request->validate([
            'name' => 'required|string|min:1|max:10'
        ]);

        $data['slug'] = Str::slug($request->name);

        Platform::create($data);
        Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success', 'Platform created successfully');
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
        $item = Platform::findOrFail($id);
        return view('pages.admin.category.edit-platform', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:1|max:10'
        ]);

        $item = Platform::findOrFail($id);
        $item->update($data);
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('category.index')->with('success', 'Platform updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Platform::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
