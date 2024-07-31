<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopupgamePackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'developer',
        'description',
        'about',
        'slug',
        'price',
        'stock',
        'category_id',
        'platform',
        'image',
    ];

    protected $hidden = [];

    // public function category(){
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }

    
    public function gallery(){
        return $this->hasMany(Gallery::class, 'topupgame_packages_id', 'id');
    }

}
