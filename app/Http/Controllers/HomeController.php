<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = TopupgamePackage::all();
        $transactions = Transaction::all();
        return view('pages.homepage', ['items' => $data], ['transactions' => $transactions]);
    }

    // public function cartList(){
    //     // $transactions = Transaction::all(); // Gunakan 'transactions' untuk konsistensi.
    //     // return view('pages.cart', compact('transactions'));

    //     $user = Auth::user();
    //     $transactions = Transaction::with('game', 'user')->where('user_id',$user->id)->where('transaction_status', 'IN_CART')->get();
    //     return view('pages.cart', compact('transactions'));
    // }
}
