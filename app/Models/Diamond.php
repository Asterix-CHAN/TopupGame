<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diamond extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
      'uuid', 'game_id', 'price', 'diamond', 'slug'
        
    ];

    protected $hidden = [];

    public function event(){
        return $this->hasMany(ProductPackage::class, 'diamond_id', 'id');
    }

    public function game_packages(){
        return $this->belongsTo(TopupgamePackage::class, 'game_id', 'id');
    }

}
