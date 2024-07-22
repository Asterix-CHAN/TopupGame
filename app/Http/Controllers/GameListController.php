<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopupgamePackage;

class GameListController extends Controller
{
    public function index(Request $request){
        $items = TopupgamePackage::all();

        return view('pages.gamepage', ['items' => $items]);
    }
}
