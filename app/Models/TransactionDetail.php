<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 
        'transaction_id', 
        'produk_name', 
        'description',
    ];

    protected $hidden = [];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
