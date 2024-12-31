<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Diamond;
use Livewire\Component;
use App\Models\TopupgamePackage;

class Order extends Component
{
    public $uuid;
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
    protected function rules()
    {
        return [
            [
                'server_game' => 'required|string|max:255',
                'uid_game' => 'required|string|max:255',
                'transaction_status' => 'sometimes|string|in:IN_CART,CHALLENGE,SUCCESS,PENDING,CANCEL,FAILED,EXPIRED',
                'diamond_total' => 'nullable|integer|min:0',
                // 'gross_amount' => 'required|numeric|min:0',
                'phone_number' => ['required', 'string', 'regex:/^(\+62|08)[0-9]{9,12}$/'],
                'price' => 'nullable|numeric|min:0'
            ],
            [
                'phone_number.regex' => 'Nomor telepon harus dimulai dengan +62 atau 08 dan terdiri dari 10-13 digit.',
            ]
        ];
    }
    public function process($uuid)
    {
        // Ambil nilai dari input
        $selectValue = $this->select; // Contohnya: "50000|100"

        // Pisahkan nilai menjadi harga dan jumlah diamond
        [$price, $diamond] = explode('|', $selectValue);

        $gamePackages = TopupgamePackage::where('uuid', $uuid)->firstOrFail();
    }
    public function render()
    {

        return view(
            'livewire.order.order',

        );
    }
}
