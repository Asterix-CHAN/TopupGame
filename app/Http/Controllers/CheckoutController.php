<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Diamond;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TopupgamePackage;
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

    public function process(Request $request, $slug)
    {
        $gamePackages = TopupgamePackage::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'server_game' => 'required|string',
            'uid_game' => 'required|string',
            'diamond_total' => 'required|integer|min:0',
            'total_amount' => 'required|numeric|min:0',
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
        // Ubah dengan uuid
        return redirect()->route('transaction.index', ['slug' => $gamePackages->slug, 'transaction' => $transaction->uuid]);
    }
}
