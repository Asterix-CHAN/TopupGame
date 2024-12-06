<?php

namespace App\Livewire\PaymentMethod;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\PaymentMethod;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[On('sweet-alert')]
    public function updateCreate($items = null){

    }
    public function render()
    {
        
        return view('livewire.payment_method.index', [
            'items' => PaymentMethod::latest()->paginate(2),
        ]);
    }

}
