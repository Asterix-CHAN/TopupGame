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
        Schema::table('topupgame_packages', function (Blueprint $table) {
            // $table->foreignId('platform_id')->constrained('platforms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('platform_id')->constrained('name')->on('platforms')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('topupgame_packages', function (Blueprint $table) {
            $table->dropForeign('topupgame_packages_platform_id_foreign');
        });
    }
};
