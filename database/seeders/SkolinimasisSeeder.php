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
            $randomBook3 = Knyga::inRandomOrder()
                ->where('id', '!=', optional($randomBook2)->id)
                ->where('id', '!=', optional($randomBook1)->id)
                ->first();

            if ($randomBook1 && $randomBook2 && $randomBook3) {
                $availableCopies1 = $randomBook1->laisvi_egzemplioriai;
                $availableCopies3 = $randomBook3->laisvi_egzemplioriai;

                // Create Skolinimasis instances for each available copy for the first book
                for ($i = 0; $i < $availableCopies1; $i++) {
                    $skolinimasis1 = new Skolinimasis([
                        'pradzios_data' => now(),
                        'pabaigos_data' => now()->addDays(31),
                    ]);
                    $skolinimasis1->vartotojas()->associate($lankytojasUser);
                    $skolinimasis1->knyga()->associate($randomBook1);
                    $skolinimasis1->save();
                }

                // Create a Skolinimasis instance for the second book
                $skolinimasis2 = new Skolinimasis([
                    'pradzios_data' => now(),
                    'pabaigos_data' => now()->addDays(31),
                ]);
                $skolinimasis2->vartotojas()->associate($lankytojasUser);
                $skolinimasis2->knyga()->associate($randomBook2);
                $skolinimasis2->save();


                $adminUser = Vartotojas::where('vardas', 'admin_user')->first();
                if ($adminUser) {
                    for ($i = 0; $i < $availableCopies3; $i++) {
                        $skolinimasis3 = new Skolinimasis([
                            'pradzios_data' => now()->subDays(62),
                            'pabaigos_data' => now()->subDays(31),
                        ]);
                        $skolinimasis3->vartotojas()->associate($adminUser);
                        $skolinimasis3->knyga()->associate($randomBook3);
                        $skolinimasis3->save();
                    }
                } else {
                    $this->command->info('Vartotojas with username admin_user not found.');
                }
            } else {
                $this->command->info('One or more books not found.');
            }
        } else {
            $this->command->info('Vartotojas with username lankytojas_user not found.');
        }
    }
}
