<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use App\Models\MidtransPayment;
use LivewireUI\Modal\ModalComponent;


class MethodPayment extends ModalComponent
{
    public $payment_type; 
    public $uuid;
    public $transaction_id;
    public function mount($midtrans)
    {
        $this->payment_type = $midtrans;
       $this->transaction_id = $midtrans;
    }

    // Method to handle the store logic
    // public function update()
    // {
    //     // Validate the input
    //     $this->validate([
    //         'payment_type' => 'required|string',
    //     ]);

    //     $data = new MidtransPayment();
    //     $data->uuid = $this->uuid ?? Str::uuid(); // Ensure uuid is set
    //     $data->transaction_id = $this->transaction_id ?? null; // Optional, set to null if not available
    //     $data->payment_type = $this->payment_type;
    //     $data->save();
             
    //     // ]);

    //     // Close the modal
    //     $this->closeModal();

    //     // Optionally, add a success message
        
    // }



    public function render()
    {
        // Retrieve all available payment methods
        $items = PaymentMethod::all();

        // Return the view for the modal
        return view('livewire.method-payment', compact('items'));
    }
}
