<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'price','diamond_event', 'diamond_id'
    ];

    protected $hidden = [];

    public function diamond(){
        return $this->belongsTo(Diamond::class, 'diamond_id', 'id');
    }

    public function game(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }
}
