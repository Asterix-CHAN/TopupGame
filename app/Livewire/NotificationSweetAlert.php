<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationSweetAlert extends Component
{
    protected $listeners = ['remove'];


    public function alertSuccess()
    {

        $this->dispatch('swal:modal', [
            'type' => 'success',
            'message' => 'User Created Successfully!',
            'text' => ''
        ]);
    }

    public function alertConfirm()
    {
        $this->dispatch('sweet-alert', icon: 'success', title: 'Data Sudah Dibuat'
        );
    }

    public function remove()
    {
        $this->dispatch('swal:modal', [
            'type' => 'success',
            'message' => 'User Delete Successfully!',
            'text' => 'It will not list on users table soon.'
        ]);
    }
    public function render()
    {
        return view('livewire.notification-sweet-alert');
    }
}
