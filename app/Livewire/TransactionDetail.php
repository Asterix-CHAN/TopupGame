<?php

namespace App\Livewire;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use Livewire\Attributes\On;

class TransactionDetail extends ModalComponent
{

    // public $visible = false;

    // #[On('show')]

    // public function show(){
    //     $this->visible = true;
    // }

    // #[On('hide')]
    // public function hide(){
    //     $this->visible = false;
    // }
   

    public function render()
    {
        return view('livewire.transaction-detail');
     
    }
}
 