<?php

namespace Database\Seeders;

use App\Models\Vartotojas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VartotojasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vartotojas::create([
//            'role_id' => $role->id,
//            'vardas' => $role->name, // You can adjust this based on your requirements
//            'slaptazodis' => Hash::make('password'), // Change 'password' to the desired default password
            // Add other attributes if needed
        ]);
    }
}
