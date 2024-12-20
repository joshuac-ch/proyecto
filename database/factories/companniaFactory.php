<?php

namespace Database\Factories;

use App\Models\compannia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\compannia>
 */
class companniaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $empresas = [
            "Tecnología Avanzada S.A.",
            "Soluciones Innovadoras S.R.L.",
            "Comercio Electrónico Global",
            "Consultora Estratégica del Futuro",
            "Servicios Creativos y Digitales",
            "Desarrollo Web y Marketing S.A.C.",
            "Distribuciones de Productos Electrónicos",
            "Aventuras en Realidad Aumentada",
            "Innovaciones en Software S.L.",
            "Gestión de Recursos Digitales"

        ];
        $dominios = [
            "tecnovanza.com",
            "solinnovar.com",
            "ecomglobal.net",
            "consultafuturo.org",
            "creadigi.co",
            "devwebmar.com",
            "distribu.com",
            "realaura.net",
            "innoapps.io",
            "recursosdigi.com"
        ];
        $propi = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];
        return [
            "nombre_empresa" => $this->faker->randomElement($empresas),
            "dominio_empresa" => $this->faker->randomElement($dominios),
            "propietario_id" => $this->faker->randomElement($propi),
            "tipo" => $this->faker->randomElement(["tecnologia", "medicina", "negocios", "otro"]),
            "ingresos_anuales" => $this->faker->randomElement(['2000', '1000', '700', '5000', '8000', '6500', '9000', '15,000'])
        ];
    }
}
