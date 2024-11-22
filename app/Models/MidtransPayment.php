<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MidtransPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'snap_token',
        'payment_type',
        'bank',
        'va_number'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');

    }
}
