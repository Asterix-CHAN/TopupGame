<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Event;
use App\Models\Diamond;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Models\TopupgamePackage;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class CheckoutController extends Controller
{
    // ORDER
    public function index(Request $request, $slug)
    {
        $item = TopupgamePackage::with(['gallery'])->where('slug', $slug)->firstOrFail();
        $events = Event::with(['game_packages', 'diamond'])->where('slug',  $slug)->get();
        $diamonds = Diamond::with(['game_packages'])->where('slug',  $slug)->get();

        return view('pages.order', compact('item', 'events', 'diamonds'));
    }

    // TROLI
    public function cart($cart)
    {
        $transactions = Transaction::with('game')->where('IN_CART', $cart)->firstOrFail();
        return view('pages.cart', compact('transactions'));
    }

    // PROCESS PAYMENT
    public function process(Request $request, $uuid)
    {
        $gamePackages = TopupgamePackage::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'server_game' => 'required|string',
            'uid_game' => 'required|string',
            'transaction_status' => 'sometimes|string|in:IN_CART,CHALLENGE,SUCCESS,PENDING,CANCEL,FAILED,EXPIRED',
            'diamond_total' => 'required|integer|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'phone_number' => ['required', 'string', 'regex:/^(\+62|08)[0-9]{9,12}$/',],
            'price' => 'nullable|numeric|min:0'
        ], [
            'phone_number.regex' => 'Nomor telepon harus dimulai dengan +62 atau 08 dan terdiri dari 10-13 digit.',
        ]);

        $transaction = Transaction::create([
            'uuid' => (string) Str::uuid(),
            'user_id' =>  auth()->user()->id,
            'game_id' => $gamePackages->id,
            'server_game' => $data['server_game'],
            'transaction_status' => 'IN_CART',
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
            'desc]98ription' => $request->input('description'),
            'produk_name' => $gamePackages->name,
            'total_amount' => $transaction->price += $transaction->price
        ]);

        if (!$transaction) {
            Alert::error('Error', 'Data Gagal');
            return redirect()->route('order', $gamePackages->slug)->with('error', 'Gagal Memesan');
        }
        // return redirect()->route('transaction.index', ['slug' => $gamePackages->slug, 'transaction' => $transaction->uuid]);
        return redirect()->route('transaction.show',   $transaction->uuid);
    }

    // PAYMENT
    public function payment(Request $request, $uuid)
    {
        $data = Transaction::with(['detail', 'game.gallery', 'user'])->where('uuid', $uuid)->firstOrFail();

        $data->transaction_status = "PENDING";
        $data->save();
        // return $data;
        // Mail::to($data->user->email)->send(
        //     new TransactionSuccess($data) );

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $midtrans_parameter = [
            'transaction_details' => [
                'order_id' => $data->uuid,
                'gross_amount' => (int) $data->price
            ],
            'customer_details' => [
                'first_name' => $data->user->name,
                'email' => $data->user->email,
            ],
            
            'enabled_payments' => [
                'gopay',
            ],
            'vtweb' => []
        ];
        // dd($data);
        try {
            $paymentUrl = Snap::createTransaction($midtrans_parameter)->redirect_url;
            // Redirect to Snap Payment Page
            header('Location: ' . $paymentUrl);
            // 

        } catch (Exception $e) {
            echo $e->getMessage();
        }


        // $snapToken = Snap::getSnapToken($midtrans_parameter);
        // $data->snap_token = $snapToken;
        // $data->save();

        // kirim ke email


        // return Redirect::back();
    }


    // DESTROY
    public function destroy($uuid)
    {
        $transaction = Transaction::with('game')->where('uuid', $uuid)->firstOrFail();
        $transaction->delete();

        return redirect()->route('cart.index');
    }
}
