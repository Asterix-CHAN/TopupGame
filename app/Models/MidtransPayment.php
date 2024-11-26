<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MidtransPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'merchant_id',
        'midtrans_transaction_id',
        'payment_type',
        'acquirer',
        'bank',
        'va_number',
        'transaction_id'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');

    }
}
