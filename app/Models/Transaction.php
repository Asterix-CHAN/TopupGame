<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'transaction_status' => 'IN_CART', // Set default value
    ];
    protected $fillable = [
        'uuid',
        'uid_game',
        'server_game',
        'user_id',
        'game_id',
        'diamond_total',
        'transaction_status',
        'price',
        'total_amount',
        'phone_number'
    ];

    protected $hidden =[

    ];
    
    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function game(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
