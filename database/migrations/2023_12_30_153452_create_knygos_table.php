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
        Schema::create('knygos', function (Blueprint $table) {
            $table->id();

            $table->string('pavadinimas'); // Adding 'pavadinimas' attribute as a string
            $table->string('autorius');    // Adding 'autorius' attribute as a string
            $table->unsignedSmallInteger('leidimo_metai'); // Adding 'leidimo_metai' attribute as an unsigned small integer
            $table->unsignedInteger('egzemplioriu_skaicius'); // Adding 'egzemplioriu_skaicius' attribute as an unsigned integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knygos');
    }
};
