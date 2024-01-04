<?php

namespace Database\Seeders;

use App\Models\Vartotojas;
use App\Models\Zinute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZinuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the 'visitor_user' Vartotojas
        $visitorUser = Vartotojas::where('vardas', 'visitor_user')->first();

        if ($visitorUser) {
            // Create a message without a sender for 'visitor_user'
            Zinute::create([
                'tekstas' => 'Sveikas atvykęs į biblioteką, naujas lankytojau!',
                'gauna_vartotojas_id' => $visitorUser->id,
            ]);
        } else {
            $this->error('Vartotojas with username visitor_user not found.');
        }

        // Find two random users excluding the 'visitor_user'
        $sender = Vartotojas::where('id', '<>', $visitorUser->id)->inRandomOrder()->first();
        $receiver = Vartotojas::where('id', '<>', $visitorUser->id)->inRandomOrder()->first();

        if ($sender && $receiver) {
            // Create a message between two random users
            Zinute::create([
                'tekstas' => 'Some other message text here.',
                'siuncia_vartotojas_id' => $sender->id,
                'gauna_vartotojas_id' => $receiver->id,
            ]);
        } else {
            $this->error('Could not find suitable users.');
        }

    }
}
