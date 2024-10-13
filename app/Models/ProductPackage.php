<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'price', 'diamond', 'topupgame_package_id'
    ];

    protected $hidden = [];

    public function game_packages() {
        return $this->belongsTo(TopupgamePackage::class, 'topupgame_package_id', 'id');
    }
}
