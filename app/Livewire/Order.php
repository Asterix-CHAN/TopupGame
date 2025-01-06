<?php

namespace App\Livewire;


use App\Models\Event;
use App\Models\Diamond;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\MidtransPayment;
use App\Models\TopupgamePackage;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Order extends Component
{
    public $item;
    public $diamonds;
    public $events;
    public $select;
    public $uid_game;
    public $server_game;
    public $phone_number;


    public function mount()
    {
        $this->item = TopupgamePackage::all();
        $this->diamonds = Diamond::all();
        $this->events = Event::all();
    }

    protected $rules = [
        'server_game' => 'required|string|max:255',
        'uid_game' => 'required|string|max:255',
        // 'transaction_status' => 'sometimes|string|in:IN_CART,CHALLENGE,SUCCESS,PENDING,CANCEL,FAILED,EXPIRED',
        'select' => 'required',
        'phone_number' => ['required', 'string', 'regex:/^(\+62|08)[0-9]{9,12}$/'],
        // 'price' => 'nullable|numeric|min:0',
    ];

    protected $messages = [
        'server_game.required' => 'Server game harus diisi.',
        'uid_game.required' => 'UID game harus diisi.',
        'select.required' => 'Pilih salah satu opsi.',
        'phone_number.required' => 'Nomor telepon harus diisi.',
        'phone_number.regex' => 'Nomor telepon harus dimulai dengan +62 atau 08 dan terdiri dari 10-13 digit.',
    ];

   
    public function process()
    {
        $validatedData = $this->validate();
        // Ambil nilai dari input
        $selectValue = $this->select; // Contohnya: "50000|100"

        // Pisahkan nilai menjadi harga dan jumlah diamond
        [$price, $diamond] = explode('|', $selectValue);

        $gamePackages = $this->item->first();

        $transaction = Transaction::create([
            'uuid' => (string) Str::uuid(),
            'invoice' => 'INV-' . Str::random(10),
            'user_id' =>  auth()->user()->id,
            'game_id' => $gamePackages->id,
            'server_game' => $validatedData['server_game'],
            'transaction_status' => 'IN_CART',
            'uid_game' => $validatedData['uid_game'],
            'phone_number' => $validatedData['phone_number'],
            'price' => $price,
            'diamond_total' => $diamond,
            'gross_amount' => $price += $price,
        ]);

        TransactionDetail::create([
            'uuid' => (string) Str::uuid(),
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->name,
            'description' => $this->phone_number,
            'produk_name' => $gamePackages->name,
        ]);

        MidtransPayment::create([
            'uuid' => (string) Str::uuid(),
            'transaction_id' => $transaction->id,
            'payment_type' => '',
            'link_snap' => ''
        ]);

        if (!$transaction) {

            return redirect()->route('order', $this->gamePackages->slug)->with('error', 'Gagal Memesan');
        }
        // return redirect()->route('transaction.index', ['slug' => $gamePackages->slug, 'transaction' => $transaction->uuid]);
        return redirect()->route('transaction.show',   $transaction->uuid);
    }
    public function render()
    {

        return view(
            'livewire.order.order',

        );
    }
}
