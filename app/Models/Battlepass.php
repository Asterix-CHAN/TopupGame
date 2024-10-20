<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Battlepass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'uuid', 'price', 'name', 'slug'
    ];

    protected $hidded = [];

    public function game(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }
}
