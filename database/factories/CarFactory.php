<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id' => Owner::factory(),
            'reg_number' => fake()->regexify('[A-Za-z0-9]{6}'),
            'brand' => fake()->word(),
            'model' => fake()->word()
        ];
    }
}
