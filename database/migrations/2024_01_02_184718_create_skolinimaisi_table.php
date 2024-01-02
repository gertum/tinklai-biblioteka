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
        Schema::create('skolinimaisi', function (Blueprint $table) {
            $table->id();

            $table->dateTime('pradzios_data');
            $table->dateTime('pabaigos_data');
            $table->dateTime('grazinimo_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skolinimaisi');
    }
};
