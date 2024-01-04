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
        Schema::create('zinutes', function (Blueprint $table) {
            $table->id();
            $table->text('tekstas');

            // Foreign key referencing Vartotojas who sends the message (nullable)
            $table->unsignedBigInteger('siuncia_vartotojas_id')->nullable();
            $table->foreign('siuncia_vartotojas_id')->references('id')->on('vartotojai');

            // Foreign key referencing Vartotojas who receives the message (not nullable)
            $table->unsignedBigInteger('gauna_vartotojas_id');
            $table->foreign('gauna_vartotojas_id')->references('id')->on('vartotojai');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zinutes');
    }
};
