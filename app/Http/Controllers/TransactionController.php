<?php

namespace App\Http\Controllers;

use CURLFile;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($uuid)
    {
        $items = Transaction::with(['detail', 'game',  'user',])->where('uuid', $uuid)->first();
        //    dd($items->detail);
        return view('pages.checkout',  compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Transaction::with('game', 'user')->first();

        $phoneNumber = $data['phone_number'];
        $length = 5;
        $invoice = Str::random($length);

        $token = '1L9kc1hCTU12ELiFz3u8';
        $message = "
*INVOICE {$invoice}*
        
*PEMBELIAN*

UID Game: {$data->uid_game}
Server Game: {$data->server_game}
Status Payment: Pending

*BANK TRANSFER*

BCA
435345345345
{$data->user->name}
{$data->price}

Note : 
Payment processed automatically in 15 minutes.
Avoid transaction at 11PM to 6AM GMT+7

Thank you!
";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $phoneNumber,
                'message' => $message,
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization:' . $token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        Alert::success('Success', 'Diamond Berhasil Dibeli');
        return redirect()->route('cart.index')->with('success', 'Data Terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, $uuid)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction, $uuid)
    {
        // $transaction = Transaction::with('game')->where('uuid', $uuid)->firstOrFail();
        // $transaction->delete();

        // return redirect()->route('order',);
    }
}
