<?php

namespace App\Livewire\PaymentMethod;

use Livewire\Component;
use Illuminate\Support\Str;

use Livewire\Attributes\Url;
use App\Models\PaymentMethod;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;

class Create extends ModalComponent
{
    use WithFileUploads;

    public $id;
    public $name;
    public $payment_type;
    public $image = null;
    public $temporary = null;
    public $fee_admin;
    public PaymentMethod $payment;
    
  

    // Validasi properti
    protected $rules = [
        'name' => 'required|string|max:255',
        'payment_type' => 'required|string|max:255',
        'fee_admin' => 'required|numeric|min:0',
        'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
    ];

   public function mount(PaymentMethod $payment){
    $this->payment = $payment;
    $this->name = $payment->name;
    $this->payment_type = $payment->payment_type;
    $this->fee_admin = $payment->fee_admin;
    $this->image = $payment->image;
    $this->temporary = $payment->image;
   }

    public function resetFields()
    {
        $this->id = null;
        $this->name = '';
        $this->payment_type = '';
        $this->fee_admin = '';
        $this->image = null;
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Membuat entitas baru items
        $items =  new PaymentMethod();
        $items->uuid = Str::uuid();
        $items->name = $validatedData['name'];
        $items->fee_admin = $validatedData['fee_admin'];
        $items->payment_type = $validatedData['payment_type'];
        $items->slug = Str::slug($this->name);
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
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->dispatch(
                'sweet-alert',
                $items,
                icon: 'error',
                title: 'Data Gagal Disimpan',
            );
        }
    }


    // public function edit($id)
    // {
    //    $payment = PaymentMethod::findOrFail($id);
     
    //        $this->id = $payment->id;
    //        $this->name = $payment->name;
    //        $this->payment_type = $payment->payment_type;
    //        $this->fee_admin = $payment->fee_admin;
    //        $this->image = $payment->image;
    // }


    public function update()
    {

        $items = PaymentMethod::find($this->id);
        if ($items) {
            if ($this->image) {
                // Hapus gambar lama jika ada, baru simpan yang baru
                if ($items && $items->image) {
                    Storage::delete('assets/payment-methods/' . $items->image);
                }
                $imagePath = $this->image->store('assets/payment-methods/', 'public');
            }
            try {
                $items->update([
                    'name' => $this->name,
                    'payment_type' => $this->payment_type,
                    'fee_admin' => $this->fee_admin,
                    'image' => $imagePath ? $imagePath : $items->image,
                    'slug' => Str::slug($this->name)
                ]);
                // $this->mount();
                $this->resetFields();
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
    }
    public function render()
    {
        return view('livewire.payment_method.create');
    }
}
