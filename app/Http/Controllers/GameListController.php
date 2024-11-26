<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Category;
use App\Models\Platform;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;

class GameListController extends Controller
{
    
    public function index(Request $request){
      
        $items = TopupgamePackage::all();
        $plat = Platform::with(['topup'])->get();
        $cat = Category::with(['topup'])->get();

        return view('pages.gamepage', ['items' => $items, 'plats' => $plat, 'cats' => $cat]);
    }


    public function show(string $name){
        $item = Topupgamepackage::with([
            'categories', 'platform_name', 
        ])->findOrFail($name);
        return view('pages.gamepage',['shows' => $item]);
    }
}
