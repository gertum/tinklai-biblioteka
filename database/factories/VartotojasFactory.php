<?php

namespace Database\Factories;

use App\Models\Vartotojas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Vartotojas>
 */
class VartotojasFactory extends Factory
{
    protected $model = Vartotojas::class;

    public function definition()
    {
        return [
            'role_id' => mt_rand(1, 4), // Assuming role_id references roles from 1 to 4
            'vardas' => $this->faker->unique()->userName,
            'slaptazodis' => Hash::make('password'), // Assuming default password is 'password'
            // Define other attributes here...
        ];
    }
}
