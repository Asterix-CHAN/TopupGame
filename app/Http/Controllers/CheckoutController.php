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
use App\Models\MidtransPayment;
use App\Models\PaymentMethod;
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
            'gross_amount' => 'nullable|numeric|min:0',
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
            'gross_amount' => $data['gross_amount'] ?? 0,
        ]);

        TransactionDetail::create([
            'uuid' => (string) Str::uuid(),
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->name,
            'description' => $request->input('description'),
            'produk_name' => $gamePackages->name,
            'gross_amount' => $transaction->price += $transaction->price
        ]);

        MidtransPayment::create([
            'uuid' => (string) Str::uuid(),
            'transaction_id' => $transaction->id,
            'payment_type' => 'gopay'
        ]);



        if (!$transaction) {
            Alert::error('Error', 'Data Gagal');
            return redirect()->route('order', $gamePackages->slug)->with('error', 'Gagal Memesan');
        }
        // return redirect()->route('transaction.index', ['slug' => $gamePackages->slug, 'transaction' => $transaction->uuid]);
        return redirect()->route('transaction.show',   $transaction->uuid);
    }

    // Metode Pembayaran
    public function paymentMethod(Request $request, $uuid)
    {
        $data = Transaction::with(['game.gallery', 'user'])->where('uuid', $uuid)->firstOrFail();
        $items = MidtransPayment::with('transaction')->where('transaction_id', $data->id)->firstOrFail();
        $items->payment_type = $request->payment_type;

        $items->save();

        return redirect()->route('transaction.show',   $data->uuid);
    }

    // PAYMENT
    public function payment(Request $request, $uuid)
    {
        $data = Transaction::with(['game.gallery', 'user'])->where('uuid', $uuid)->firstOrFail();
        $midtrans = MidtransPayment::with('transaction')->where('transaction_id', $data->id)->firstOrFail();
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
                'last_name' => '',
                'email' => $data->user->email,
                'phone' => $data->user->phone_number
            ],
            'enabled_payments' => [$midtrans->payment_type],
            'vtweb' => []
        ];
       
        try {
            $paymentUrl = Snap::createTransaction($midtrans_parameter)->redirect_url;
      
            return redirect()->away($paymentUrl);
          

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return Redirect::back();

    }

    

    // DESTROY
    public function destroy($uuid)
    {
        $transaction = Transaction::with('game')->where('uuid', $uuid)->firstOrFail();
        $transaction->delete();

        return redirect()->route('home');
    }
}
