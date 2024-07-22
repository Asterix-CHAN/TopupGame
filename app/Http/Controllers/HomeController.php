<?php

namespace App\Http\Controllers;

use App\Models\TopupgamePackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = TopupgamePackage::all();

        return view('pages.homepage', ['items' => $data]);
    }
}
