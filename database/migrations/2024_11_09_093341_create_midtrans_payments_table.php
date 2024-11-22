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
            $table->string('snap_token')->nullable();
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->string('payment_type');
            $table->string('bank')->nullable();
            $table->string('va_number')->nullable();
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
