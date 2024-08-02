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
        // 'categories',
        // 'platform',
        'stock',
        'image',
    ];

    protected $hidden = [];

    public function categories()
{
    return $this->belongsToMany(Category::class);
}

    
    public function gallery(){
        return $this->hasMany(Gallery::class, 'topupgame_packages_id', 'id');
    }

}
