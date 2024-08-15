<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Gallery::with(['topupgame_packages'])->get();
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.admin.galleries.index', ['items' => $items]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = TopupgamePackage::all();
        return view('pages.admin.galleries.create', [
            'topupgame_packages' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $item = $request->all();
        $item['image'] = $request->file('image')->store('assets/galleries', 'public');

       
        Gallery::create($item);
        Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    
      
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
        $data = Gallery::with(['topupgame_packages'])->findOrFail($id);
        $topupgame_packages = TopupgamePackage::all();
        // $topupgame_packages = TopupgamePackage::where('id', $data->id)->first();
        // dd($topupgame_packages);
        return view('pages.admin.galleries.edit', ['galeri' => $data, 'games' => $topupgame_packages]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, string $id)
    {
        $item = $request->all();
           
        $item['image'] = $request->file('image')->store('assets/galleries', 'public');
       
            $data = Gallery::findOrFail($id);
            $data->update($item);
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->with('success', 'Data berhasil diubah');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Gallery::findOrFail($id);
   
        $data->delete();
        Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
}
