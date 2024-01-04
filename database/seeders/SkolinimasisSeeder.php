<?php

namespace Database\Seeders;

use App\Models\Knyga;
use App\Models\Skolinimasis;
use App\Models\Vartotojas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkolinimasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the user by their username
        $user = Vartotojas::where('vardas', 'visitor_user')->first();

        if ($user) {
            // Get a random book
            $randomBook = Knyga::inRandomOrder()->first();

            if ($randomBook) {
                // Create a Skolinimasis instance for the user associated with the random book
                $skolinimasis = new Skolinimasis([
                    'pradzios_data' => now(), // Set the start date/time
                    'pabaigos_data' => now()->addDays(14), // Set the end date/time (for example, 14 days from now)
                    // Add other attributes as needed
                ]);

                // Associate the Skolinimasis with the user and the random book
                $skolinimasis->vartotojas()->associate($user);
                $skolinimasis->knyga()->associate($randomBook);
                $skolinimasis->save();
            } else {
                $this->command->info('No books found.');
            }
        } else {
            $this->command->info('Vartotojas with username visitor_user not found.');
        }
    }
}
