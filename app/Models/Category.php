<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 
        // 'platform'
    ];

    protected $hidden = [];
    protected $dates = ['deleted_at'];
    public function topup()
    {
        return $this->belongsToMany(TopupgamePackage::class);
    }
}
