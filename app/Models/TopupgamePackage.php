<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'platform_id',
        'stock',
        'image',
    ];

    protected $hidden = [];


    public function platform_name(): BelongsTo
    {
        return $this->belongsTo(Platform::class, 'platform_id', 'id');
    }
    
    public function categories(): BelongsToMany
{
    return $this->belongsToMany(Category::class);
}

    
    public function gallery(){
        return $this->hasMany(Gallery::class, 'topupgame_packages_id', 'id');
    }

}
