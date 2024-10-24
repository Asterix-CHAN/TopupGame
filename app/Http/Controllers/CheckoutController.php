<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Diamond;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class CheckoutController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = TopupgamePackage::with(['gallery'])->where('slug', $slug)->firstOrFail();
        $events = Event::with(['game_packages', 'diamond'])->where('slug',  $slug)->get();
        $diamonds = Diamond::with(['game_packages'])->where('slug',  $slug)->get();

        return view('pages.order', compact('item', 'events', 'diamonds'));
    }


    public function cart(){
        $transactions = Transaction::with('game')->get();
        return view('pages.cart', compact('transactions'));
    }

    public function process(Request $request, $uuid)
    {
        $gamePackages = TopupgamePackage::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'server_game' => 'required|string',
            'uid_game' => 'required|string',
            'diamond_total' => 'required|integer|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'phone_number' => ['required','string','regex:/^(\+62|08)[0-9]{9,12}$/',],
            'price' => 'nullable|numeric|min:0'
        ], [
            'phone_number.regex' => 'Nomor telepon harus dimulai dengan +62 atau 08 dan terdiri dari 10-13 digit.',
        ]);

        $transaction = Transaction::create([
            'uuid' => (string) Str::uuid(),
            'user_id' =>  auth()->user()->id,
            'game_id' => $gamePackages->id,
            'server_game' => $data['server_game'],
            'uid_game' => $data['uid_game'],
            'phone_number' => $data['phone_number'],
            'price' => $data['price'] ?? 0,
            'diamond_total' => $data['diamond_total'] ?? 0,
            'total_amount' => $data['total_amount'] ?? 0,
        ]);

        TransactionDetail::create([
            'uuid' => (string) Str::uuid(),
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->name,
            'description' => $request->input('description'),
            'produk_name' => $gamePackages->name,
            'total_amount' => $transaction->price += $transaction->price
        ]);

        if(!$transaction){
            Alert::error('Error', 'Data Gagal');
            return redirect()->route('order', $gamePackages->slug)->with('error', 'gagal');
        }
        // return redirect()->route('transaction.index', ['slug' => $gamePackages->slug, 'transaction' => $transaction->uuid]);
        return redirect()->route('transaction.index',   $transaction->uuid);
    }


   public function destroy($uuid){
    $transaction = Transaction::with('game')->where('uuid', $uuid)->firstOrFail();
    $transaction->delete();

    return redirect()->route('cart.index');
   }
}
