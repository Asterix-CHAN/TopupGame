<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'uuid',
        'name',
        'image',
        'fee_admin',
        'payment_type',
        'slug'
        ];

        protected $hidden = [];

        public function transaction(){
            return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
        }
}
