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
        'name', 'slug'
    ];

    protected $hidden = [];

    /**
     * Set the categories
     *
     */

    // public function setCatAttribute($value)
    // {
    //     $this->attributes['name'] = json_encode($value);
    // }

    /**
     * Get the categories
     *
     */
    // public function getCatAttribute($value)
    // {
    //     return $this->attributes['name'] = json_decode($value);
    // }

    public function topup_packages()
    {
        return $this->hasMany(TopupgamePackage::class, 'category_id', 'id');
    }
}
