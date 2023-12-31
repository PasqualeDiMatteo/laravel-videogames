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
        Schema::create('console_game', function (Blueprint $table) {
            $table->id();

            //Foreign Keys - Short version
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->foreignId('console_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('console_game');
    }
};
