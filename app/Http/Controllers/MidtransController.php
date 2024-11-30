<?php

namespace App\Http\Controllers;


use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\MidtransPayment;
use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // VerifyCsrfToken/middleware
        // midtrans/*
        // config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Midtrans Notification
        try {
            $notif = new Notification();
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        $status = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $transaction = Transaction::where('uuid', $order_id)->firstOrFail();
        $midtransPayment = MidtransPayment::with('transaction')->where('transaction_id', $transaction->id)->firstOrFail();
        // error_log("Order ID $notif->order_id: "."transaction status = $status, fraud staus = $fraud");


        // MIDTRANS CONDITION STATUS NOTIFICATION
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                $transaction->transaction_status = ($fraud == 'challenge') ? 'CHALLENGE' : 'SUCCESS';
            }
        } else if ($status == 'settlement') {
            $midtransPayment->payment_type = $type;

            if ($type == 'bank_transfer') {
                $midtransPayment->bank = $notif->va_numbers[0]->bank;
                $midtransPayment->va_number = $notif->va_numbers[0]->va_number;
            } else if ($type == 'qris') {
                $midtransPayment->e_wallet = $notif->acquirer;
            } else if ($type == 'cstore') {
                $midtransPayment->store = $notif->store;
            }

            $midtransPayment->midtrans_transaction_id = $notif->transaction_id;
            $midtransPayment->merchant_id = $notif->merchant_id;

            $transaction->transaction_status = 'SUCCESS';
        } else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->transaction_status = 'FAILED';
        } else if ($status == 'expire') {
            if ($type == 'qris') {
                $midtransPayment->payment_type = $type;
            }
            $transaction->transaction_status = 'EXPIRED';
        } else if ($status == 'cancel') {
            $transaction->transaction_status = 'FAILED';
        }


        $transaction->save();
        $midtransPayment->save();


        // sending to email
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'accept') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction),

                );
            } else if ($status == 'settlement') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction),

                );
            } else if ($status == 'success') {
                Mail::to($transaction->user->email)->send(
                    new TransactionSuccess($transaction),

                );
            } else if ($status == 'capture'  && $fraud == 'deny') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.success');
    }


    public function unfinishRedirect(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.failed');
    }
}
