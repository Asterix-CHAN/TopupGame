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
       'uuid', 'price', 'diamond_event', 'slug', 'game_id', 'diamond_id'
    ];

    protected $hidden = [];

    

    public function game_packages(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }

    public function diamond(){
        return $this->belongsTo(Diamond::class, 'diamond_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'event_id', 'id');
    }
}
