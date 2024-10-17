<?php

namespace App\Models;

use App\Models\Battlepass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'topupgame_package_id',
        'diamond_id',
        'event_id',
        'battlepass_id'
    ];

    protected $hidden = [];

    public function game_packages()
    {
        return $this->belongsTo(TopupgamePackage::class, 'topupgame_package_id', 'id');
    }

    public function diamond()
    {
        return $this->belongsTo(Diamond::class, 'diamond_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function battlepass()
    {
        return $this->belongsTo(Battlepass::class, 'battlepass_id', 'id');
    }
}
