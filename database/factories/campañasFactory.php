<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\campañas;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\campañas>
 */
class campañasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        return [
            'nombre' => $this->faker->company,
        ];
    }
}
