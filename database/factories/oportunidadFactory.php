<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\oportunidad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\oportunidad>
 */
class oportunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $descripciones = [
            "Oportunidad para vender un paquete de software de gestión empresarial a una pequeña y mediana empresa.",
            "Presentación de una solución de comercio electrónico a un cliente que busca mejorar su presencia en línea.",
            "Propuesta de renovación de hardware para una institución educativa con descuentos exclusivos.",
            "Venta de una suscripción a un servicio de almacenamiento en la nube para una startup en crecimiento.",
            "Oportunidad de venta de una plataforma de análisis de datos a una empresa de marketing digital.",
            "Oferta de un sistema de gestión de relaciones con clientes (CRM) a un negocio de ventas al por menor.",
            "Propuesta de un nuevo dispositivo de seguridad para una empresa de logística.",
            "Presentación de una solución de automatización de procesos a un cliente en el sector de manufactura.",
            "Oportunidad de venta de servicios de consultoría en ciberseguridad para una empresa tecnológica.",
            "Oferta de capacitación en herramientas digitales para una organización sin fines de lucro."
        ];
        $fechas = [
            "2024-11-01",
            "2024-11-15",
            "2024-12-05",
            "2025-01-20",
            "2025-02-10",
            "2025-03-30",
            "2025-04-14",
            "2025-05-22",
            "2025-06-18",
            "2025-07-07"
        ];
        $v = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $p = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $c = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $fecha_cierre = ["2024-11-12", "2024-11-21", "2024-11-30"];
        return [
            "descipcion" => $this->faker->randomElement($descripciones),
            "estado" => $this->faker->randomElement([
                "nuevo",
                "en proceso",
                "en negociacion",
                "ganada",
                "perdida",
                "en espera",
                "cancelada",
                "reabierta"
            ]),
            'fecha' => $this->faker->randomElement($fechas),
            "vendedor_id" => $this->faker->randomElement($v),
            "producto_id" => $this->faker->randomElement($p), #opcional deberia ser el producto?
            "fecha_estimada_cierre" => $this->faker->randomElement($fecha_cierre),
            "cliente_id" => $this->faker->randomElement($c)

        ];
    }
}
