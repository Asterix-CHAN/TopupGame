<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Diamond;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;

class OrderController extends Controller
{
    public function index(Request $request, $slug){
        $item = TopupgamePackage::with(['gallery'])->where('slug', $slug)->firstOrFail();
        $events = Event::with(['game_packages', 'diamond'])->where('slug',  $slug)->get();
        $diamonds = Diamond::with(['game_packages'])->where('slug',  $slug)->get();

        // $combinedData = collect([
        //     'topup' => $item,
        //     'events' => $events,
        //     'diamonds' => $diamonds,
        // ]);
        return view('pages.order', compact('item', 'events', 'diamonds'));
    }


    public function process($slug)
{
    $gamePackages = TopupgamePackage::where('slug', $slug)->firstOrFail();

    // Mengambil input yang diterima dari form
    $transaction = Transaction::create([
        'user_id' => auth()->id(),
        'game_id' => $gamePackages->id,
        'server_game' => request()->input('server_game'),  
        'uid_game' => request()->input('uid_game'),         
        'phone_number' => request()->input('phone_number'), 
        'price' => 0,
        'diamond_total' => request()->input('diamond_total'),
        'total_amount' => request()->input('total_amount'),
    ]);

    return view('pages.checkout', ['transaction' => $transaction]);
}

}



