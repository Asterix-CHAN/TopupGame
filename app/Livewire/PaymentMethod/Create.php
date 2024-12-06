<?php

namespace App\Livewire\PaymentMethod;

use Livewire\Component;
use Illuminate\Support\Str;

use App\Models\PaymentMethod;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use PhpParser\Node\Stmt\TryCatch;

class Create extends ModalComponent
{
    use WithFileUploads;

    public $uuid;
    public $name;
    public $payment_type;
    public $image;
    public $cost;

    // Validasi properti
    protected $rules = [

        'name' => 'required|string|max:255',
        'payment_type' => 'required|string|max:255',
        'cost' => 'required|numeric|min:0',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Membuat entitas baru items
        $items = new PaymentMethod();
        $items->uuid = Str::uuid();
        $items->name = $validatedData['name'];
        $items->cost = $validatedData['cost'];
        $items->payment_type = $validatedData['payment_type'];

        // Simpan gambar jika ada
        if ($this->image) {
            $imagePath = $this->image->store('assets/payment-methods', 'public');
            $items->image = $imagePath;
        }

        try {
            $items->save();
            $this->closeModal();

            $this->dispatch(
                'sweet-alert',
                $items,
                icon: 'success',
                title: 'Data Berhasil Disimpan',
            );
        } catch (\Throwable $th) {
            $this->dispatch(
                'sweet-alert',
                $items,
                icon: 'error',
                title: 'Data Gagal Disimpan',
            );
        }
    }

    public function render()
    {
        return view('livewire.payment_method.create');
    }
}
