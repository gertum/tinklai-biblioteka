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
        Schema::create('vartotojai', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id')->constrained('roles');
            $table->string('vardas')->unique();
            $table->string('slaptazodis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vartotojai');
    }
};
