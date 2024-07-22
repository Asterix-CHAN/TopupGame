<?php

namespace App\Http\Controllers;

use App\Models\TopupgamePackage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, $slug){
        $items = TopupgamePackage::with(['gallery'])->where('slug', $slug)->firstOrFail();

        return view('pages.order', ['item' => $items]);
    }
}
