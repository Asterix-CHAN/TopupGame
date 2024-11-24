<?php

namespace App\Livewire;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use Livewire\Attributes\On;

class TransactionDetail extends ModalComponent
{

    public function render()
    {
        return view('livewire.transaction-detail');
     
    }
}
 