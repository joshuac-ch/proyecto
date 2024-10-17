<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\formularios;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\factory>
 */
class formulariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
        ];
    }
}
