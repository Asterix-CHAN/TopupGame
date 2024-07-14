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
        Schema::create('topupgame_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('developer');
            $table->text('description');
            $table->longText('about');
            $table->string('slug');
            $table->double('price');
            $table->string('stock');
            $table->date('transaction_date');
            $table->foreignId('category_id');
            $table->foreignId('platform_id');
            $table->text('image');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topupgame_packages');
    }
};
