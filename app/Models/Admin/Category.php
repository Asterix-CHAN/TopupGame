<?php

namespace App\Models\Admin;

use App\Models\TopupgamePackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'topup_packages_id','name'
    ];

    protected $hidden = [];

    public function topupgame_packages(){
        return $this->belongsTo(TopupgamePackage::class, 'topupgame_packages', 'id');
    }
}
