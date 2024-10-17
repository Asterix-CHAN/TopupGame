<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\ProductPackage;
use App\Models\TopupgamePackage;
use App\Http\Controllers\Controller;
use App\Models\Diamond;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = ProductPackage::with('game_packages', 'diamond', 'event', 'battlepass')->get(); 
        //  // sweetAlert Delete message
        //  $title = 'Delete Product!';
        //  $text = "Are you sure you want to delete?";
        //  confirmDelete($title, $text);
        // return view('pages.admin.product-packages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $data = TopupgamePackage::find($id);
        $diamonds = Diamond::all();
        if (!$data) {
            return redirect()->back()->with('error', 'Product Package not found');
        }
        return view('pages.admin.product-packages.create', compact('data', 'diamonds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'price' => 'required|integer',
        //     'diamond' => 'required|integer',
        //     'topupgame_package_id' => 'required|integer|exists:topupgame_packages,id',
        // ]);

        // ProductPackage::create($data);
        // Alert::success('Success Title', 'Success Message');
        // return redirect()->route('product-packages.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $items = ProductPackage::with('game_packages')->findOrFail($id);

        // return view('pages.admin.topup-game-package.show-producst', compact('items'));

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

        try {
            $data = ProductPackage::findOrFail($id);
            $data->delete();
            Alert::success('Success Title', 'Success Message');
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
