<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuarios = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return [
            'rol' => $this->faker->randomElement(["ventas", "marketing", "TI", "comercio", "servicios", "admin usuarios"]),
            'user_id' => $this->faker->unique()->randomElement($usuarios)
        ];
    }
}
