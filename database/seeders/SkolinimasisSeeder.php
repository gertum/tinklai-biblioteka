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
        // Find the lankytojas user
        $lankytojasUser = Vartotojas::where('vardas', 'visitor_user')->first();

        if ($lankytojasUser) {
            // Get a random book and another random book
            $randomBook1 = Knyga::inRandomOrder()->first();
            $randomBook2 = Knyga::inRandomOrder()->where('id', '!=', optional($randomBook1)->id)->first();

            if ($randomBook1 && $randomBook2) {
                $availableCopies1 = $randomBook1->laisvi_egzemplioriai;
                $availableCopies2 = $randomBook2->laisvi_egzemplioriai;

                // Create Skolinimasis instances for each available copy for the first book
                for ($i = 0; $i < $availableCopies1; $i++) {
                    $skolinimasis1 = new Skolinimasis([
                        'pradzios_data' => now(),
                        'pabaigos_data' => now()->addDays(14),
                    ]);
                    $skolinimasis1->vartotojas()->associate($lankytojasUser);
                    $skolinimasis1->knyga()->associate($randomBook1);
                    $skolinimasis1->save();
                }

                // Create a Skolinimasis instance for the second book
                $skolinimasis2 = new Skolinimasis([
                    'pradzios_data' => now(),
                    'pabaigos_data' => now()->addDays(14),
                ]);
                $skolinimasis2->vartotojas()->associate($lankytojasUser);
                $skolinimasis2->knyga()->associate($randomBook2);
                $skolinimasis2->save();
            } else {
                $this->command->info('One or more books not found.');
            }
        } else {
            $this->command->info('Vartotojas with username lankytojas_user not found.');
        }
    }
}
