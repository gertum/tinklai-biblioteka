<?php

namespace Database\Factories;

use App\Models\Knyga;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends Factory<Knyga>
 */
class KnygaFactory extends Factory
{
    protected $model = Knyga::class;

    public function definition()
    {
        return [
            'pavadinimas' => $this->faker->sentence,
            'autorius' => $this->faker->name,
            'leidimo_metai' => $this->faker->year,
            'egzemplioriu_skaicius' => $this->faker->numberBetween(1, 10),
            // Define other attributes here...
        ];
    }
}
