<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('midtrans_payments', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('merchant_id')->nullable();
            $table->string('midtrans_transaction_id')->nullable();
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->string('payment_type');
            $table->string('acquirer')->nullable();
            $table->string('e_wallet')->nullable();
            $table->string('bank')->nullable();
            $table->string('va_number')->nullable();
            $table->string('store')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midtrans_payments');
    }
};
