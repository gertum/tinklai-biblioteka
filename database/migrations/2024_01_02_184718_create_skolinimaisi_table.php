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

            $table->unsignedBigInteger('vartotojas_id'); // Add the foreign key column
            $table->foreign('vartotojas_id')->references('id')->on('vartotojai'); // Assuming 'id' is the primary key in 'vartotojai' table
            $table->unsignedBigInteger('knyga_id'); // Add the foreign key column for book
            $table->foreign('knyga_id')->references('id')->on('knygos'); // Assuming 'id' is the primary key in 'knygos' table
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
