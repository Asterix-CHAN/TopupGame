<?php

namespace App\Models;

use App\Models\Admin\Category;
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
        'category',
        'platform',
        'image',
    ];

    protected $hidden = [];

    public function category_id(){
        return $this->hasMany(Category::class, 'topupgame_packages', 'id');
    }

    
    public function gallery(){
        return $this->hasMany(Gallery::class, 'topupgame_packages_id', 'id');
    }

}
