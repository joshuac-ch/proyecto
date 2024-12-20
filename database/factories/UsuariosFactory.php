<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\usuarios;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombres = ["nino", 'itsuki', 'joshua', 'ichika', 'andrea', 'yotsuba', 'fargan', 'syr', 'yamada', 'wuaguri'];
        $correo = [
            'nino@gmail.com',
            'itsuki@gmail.com',
            'joshua@gmail.com',
            'nino2121nk@gmail.com',
            'wuaguri@gmail.com',
            'miku@gmail.com',
            'nakanoi267@gmail.com',
            'condorenajoshua98@gmail.com',
            'fargan212@gmail.com'
        ];
        $nombre = $this->faker->randomElement($nombres);
        return [
            'nombre' => $nombre,
            'correo' => $this->faker->randomElement($correo),
            'contrasenna' => $this->faker->password, // o usa un valor fijo, como '123password'
        ];
    }
}
