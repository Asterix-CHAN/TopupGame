<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uid_game',
        'server_game',
        'user_id',
        'game_id',
        'diamond_total',
        'price',
        'total_amount',
        'phone_number'
    ];

    protected $hidden =[

    ];
    
    public function game(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function diamond(){
        return $this->belongsTo(Diamond::class, 'diamond_id', 'id');
    }

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
