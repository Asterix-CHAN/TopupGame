<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopupgamePackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillabel = [
        'name', 
        'developer',
        'description',
        'about',
        'slug',
        'price',
        'stock',
        'transaction_date',
        'category_id',
        'platform_id',
        'image',
    ];

    protected $hidden = [];
}
