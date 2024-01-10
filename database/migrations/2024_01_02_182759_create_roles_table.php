<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas')->unique();
        });

        // Insert the predefined roles into the 'roles' table
        DB::table('roles')->insert([
            ['pavadinimas' => 'Bibliotekininkas'],
            ['pavadinimas' => 'Administratorius'],
            ['pavadinimas' => 'Svečias'],
            ['pavadinimas' => 'Lankytojas'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
