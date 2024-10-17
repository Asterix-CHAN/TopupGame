<?php

namespace App\Http\Controllers;

use App\Models\Diamond;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;

class OrderController extends Controller
{
    public function index(Request $request, $slug){
        $item = TopupgamePackage::with(['gallery'])->where('slug', $slug)->firstOrFail();
        $diamonds = Diamond::with(['game_packages'])->where('slug',  $slug)->get();
        return view('pages.order', compact('item', 'diamonds'));

      
    }
}
