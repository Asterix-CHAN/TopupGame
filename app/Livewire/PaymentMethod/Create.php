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
    public $category;
    public $image = null;
    public $temporary = null;
    public $fee_admin;
    public PaymentMethod $payment;

    protected $listeners = ['deleteThis' => 'confirm'];


    // Validasi properti
    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'fee_admin' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
    ];

    public function mount(PaymentMethod $payment = null)
    {
        if ($payment) {
            $this->payment = $payment;
            $this->id = $payment->id;
            $this->name = $payment->name;
            $this->category = $payment->category;
            $this->fee_admin = $payment->fee_admin;
            $this->image = null;
            $this->temporary = $payment->image;
        } else {
            $this->resetFields();
        }
    }

    public function resetFields()
    {
        $this->id = null;
        $this->name = '';
        $this->category = '';
        $this->fee_admin = '';
        $this->image = null;
    }

    public function save()
    {
        // Validasi data input
        $validatedData = $this->validate();

        // Cek apakah proses ini untuk update atau create data
        $items = $this->id ? PaymentMethod::find($this->id) : new PaymentMethod();

        // Set nilai atribut
        $items->uuid = Str::uuid();
        $items->name = $validatedData['name'];
        $items->fee_admin = $validatedData['fee_admin'];
        $items->category = $validatedData['category'];
        $items->slug = Str::slug($validatedData['name']); // Menggunakan nama yang sudah divalidasi

        // Handle upload gambar jika ada
        if ($this->image) {
            $imagePath = $this->image->store('assets/payment-methods', 'public');
            $items->image = $imagePath;
        } elseif (!$this->id) {
            // Hapus gambar jika tidak ada gambar baru saat update
            $items->image = null;
        }

        try {
            // Simpan data ke database
            $items->save();

            // Tutup modal dan reset form
            $this->closeModal();
            $this->resetFields();

            // Tampilkan notifikasi sukses
            $this->dispatch(
                'sweet-alert',
                icon: 'success',
                title: 'Data Berhasil Disimpan',
            );
        } catch (\Throwable $th) {
            // Tampilkan notifikasi error jika gagal menyimpan
            $this->dispatch(
                'sweet-alert',
                icon: 'error',
                title: 'Data Gagal Disimpan',
            );
        }
    }

    public function confirm($id)
    {
        $this->id = $id;
        $this->dispatch('confirm-alert');
    }

    public function delete()
    {
        try {
            $items = PaymentMethod::find($this->id);
            $items->delete();
            $this->dispatch('sweet-alert', $items, icon: 'success', title: '
        Pembayaran Berhasil Dihapus');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', $items, icon: 'error', title: '
        Pembayaran Gagal Dihapus');
        }
    }

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
