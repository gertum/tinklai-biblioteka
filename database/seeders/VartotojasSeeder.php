<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Vartotojas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VartotojasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('pavadinimas', 'Administratorius')->first();

        if ($adminRole) {
            // Create an admin user
            Vartotojas::create([
                'role_id' => $adminRole->id,
                'vardas' => 'admin_user', // Adjust the username as needed
                'slaptazodis' => Hash::make('admin_password'), // Change 'admin_password' to the desired admin password
                // Add other attributes if needed
            ]);
        } else {
            // If the Administratorius role is not found
            $this->command->info('Administratorius role not found.');
        }


        // Find the Bibliotekininkas role
        $librarianRole = Role::where('pavadinimas', 'Bibliotekininkas')->first();

        if ($librarianRole) {
            // Create a librarian user
            Vartotojas::create([
                'role_id' => $librarianRole->id,
                'vardas' => 'librarian_user', // Adjust the username as needed
                'slaptazodis' => Hash::make('librarian_password'), // Change 'librarian_password' to the desired password
                // Add other attributes if needed
            ]);
        } else {
            // If the Bibliotekininkas role is not found
            $this->command->info('Bibliotekininkas role not found.');
        }

        // Find the Lankytojas role
        $visitorRole = Role::where('pavadinimas', 'Lankytojas')->first();

        if ($visitorRole) {
            // Create a visitor user
            Vartotojas::create([
                'role_id' => $visitorRole->id,
                'vardas' => 'visitor_user', // Adjust the username as needed
                'slaptazodis' => Hash::make('visitor_password'), // Change 'visitor_password' to the desired password
                // Add other attributes if needed
            ]);
        } else {
            // If the Lankytojas role is not found
            $this->command->info('Lankytojas role not found.');
        }

    }



}
