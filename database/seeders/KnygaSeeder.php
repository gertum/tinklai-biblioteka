<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Knyga;

class KnygaSeeder extends Seeder
{
    public function run()
    {
        // Using the factory to create 10 Knyga instances
        Knyga::factory()->count(10)->create();
    }
}
