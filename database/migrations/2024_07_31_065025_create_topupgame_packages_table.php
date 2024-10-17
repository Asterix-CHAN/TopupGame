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
            $table->text('description')->nullable();
            $table->longText('about')->nullable();
            $table->string('slug');
            $table->double('price');
            $table->string('stock')->nullable();
            $table->text('image')->nullable();
            // $table->foreignId('category_id')->constrained(table: 'categories');
            // $table->string('platform');
            // $table->foreignId('product_id')->constrained('products_packages');
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
