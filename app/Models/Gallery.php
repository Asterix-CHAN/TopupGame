<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
            'topupgame_packages_id', 'image'
        ];

    protected $hidden = [];


    public function topupgame_packages(){
        return $this->belongsTo(TopupgamePackage::class, 'topupgame_packages_id','id');
    }
}
