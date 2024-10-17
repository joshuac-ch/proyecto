<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\emails;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\email>
 */
class emailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_correo' => $this->faker->sentence(),
        ];
    }
}
