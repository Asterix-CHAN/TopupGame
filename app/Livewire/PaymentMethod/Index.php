<?php

namespace App\Livewire\PaymentMethod;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\PaymentMethod;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public PaymentMethod $payment;
    public $id;
    
    public function mount(PaymentMethod $payment)
    {
        $this->payment = $payment;
    }
    
    public function confirmAlert($id)
{   
     $this->id = $id;
    // dd($data);
    $this->dispatch('confirmAlert',  [
        'id'=> $id],
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!', // Kirim ID ke front-end
    );
}
    #[On('delete')]
    public function delete($id = null)
    {
        $id = $id ?? $this->id;
        $payment = PaymentMethod::find($id);

        if ($payment) {
            if($payment->image){
                Storage::delete('public/'. $payment->image);
            }
            $payment->delete();

            $this->dispatch(
                'sweet-alert',
                $payment,
                icon: 'success',
                title: 'Data Berhasil Dihapus',
            );
        } else {
            $this->dispatch(
                'sweet-alert',
                $payment,
                icon: 'error',
                title: 'Data Tidak Ditemukan',
            );
        }
    }

    #[On('sweet-alert')]
    // public function updateCreate($items = null){

    // }
    public function render()
    {

        return view('livewire.payment_method.index', [
            'items' => PaymentMethod::latest()->paginate(5),
        ]);
    }
}
