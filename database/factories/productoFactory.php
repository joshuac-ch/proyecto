<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productos = [
            "Laptop para gaming",
            "Teclado mecánico RGB",
            "Mouse inalámbrico ergonómico",
            "Tablet de alta resolución",
            "Smartphone con cámara de alta calidad",
            "Monitor ultrawide",
            "Disco duro externo SSD",
            "Cámara web",
            "Auriculares inalámbricos",
            "Altavoces Bluetooth portátiles",
            "Impresora multifuncional",
            "Router Wi-Fi de alta velocidad",
            "Smartwatch",
            "Televisor 4K",
            "Consola de videojuegos",
            "Dron con cámara HD",
            "Cargador portátil (Power Bank)",
            "Lápiz óptico para tablets",
            "Sistema de domótica (smart home)",
            "Proyector portátil",
            "Escáner portátil",
            "Repetidor Wi-Fi",
            "Kit de cámaras de seguridad",
            "Pluma 3D",
            "Smartphone plegable",
            "Termostato inteligente",
            "Asistente virtual (altavoz inteligente)",
            "Cámara de acción 4K",
            "Tablet para diseño gráfico",
            "Gafas de realidad virtual"
        ];
        $imagenes = [
            "https://i.pinimg.com/236x/26/ae/b8/26aeb86e503fc003440f652930dd7411.jpg",
            "https://rimage.ripley.com.pe/home.ripley/Attachment/MKP/3325/PMP00003548031/full_image-1.jpeg",
            "https://xercom.com.pe/archivos/2024/4/GK100.jpg",
            "https://clickbox.pe/wp-content/uploads/2021/10/Mouse-A2-RGB-Inalambrico-1.jpg",
            "https://static-geektopia.com/storage/t/p/131/131844/816x381/ipad-pro-2022.webp",
            "https://rimage.ripley.com.pe/home.ripley/Attachment/MKP/4264/PMP20000113598/full_image-1.jpeg",
            "https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/d/i/disco-duro-externo-portatil-ssd-480gb-sandisk-sdssde30-70462-default-1.jpg",
            "https://hca.pe/storage/media/large_N6FDywk4UnXz8Zgwh9KxJv1JC0aHkBCqKJCUceA1.png",
            "https://lacasadelascarcasas.es/img/cms/ACC_AU_PRO_MALVA_1500X1500_5.jpg",
            "https://ae01.alicdn.com/kf/Sf8ac9921457d4f9f93d029dace8cdc899/L-piz-ptico-Universal-activo-para-tableta-l-piz-de-pantalla-t-ctil-para-Android-Apple.jpg"

        ];
        $precios = [
            1200,  // Laptop para gaming
            150,   // Teclado mecánico RGB
            70,    // Mouse inalámbrico ergonómico
            300,   // Tablet de alta resolución
            900,   // Smartphone con cámara de alta calidad
            400,   // Monitor ultrawide
            100,   // Disco duro externo SSD
            50,    // Cámara web
            120,   // Auriculares inalámbricos
            80,    // Altavoces Bluetooth portátiles
            200,   // Impresora multifuncional
            90,    // Router Wi-Fi de alta velocidad
            250,   // Smartwatch
            700,   // Televisor 4K
            500,   // Consola de videojuegos
            1000,  // Dron con cámara HD
            40,    // Cargador portátil (Power Bank)
            25,    // Lápiz óptico para tablets
            150,   // Sistema de domótica (smart home)
            300,   // Proyector portátil
            130,   // Escáner portátil
            60,    // Repetidor Wi-Fi
            200,   // Kit de cámaras de seguridad
            100,   // Pluma 3D
            1200,  // Smartphone plegable
            150,   // Termostato inteligente
            80,    // Asistente virtual (altavoz inteligente)
            300,   // Cámara de acción 4K
            400,   // Tablet para diseño gráfico
            600    // Gafas de realidad virtual
        ];
        $descripciones = [
            "Laptop de alto rendimiento para videojuegos con tarjeta gráfica dedicada.",
            "Teclado mecánico con iluminación RGB personalizable.",
            "Mouse ergonómico inalámbrico con tecnología de precisión.",
            "Tablet de alta resolución ideal para ver contenido en HD.",
            "Smartphone con cámara de alta calidad y funciones avanzadas de fotografía.",
            "Monitor ultra ancho perfecto para multitasking y diseño.",
            "Disco duro externo SSD de alta velocidad de transferencia.",
            "Cámara web de calidad HD para videollamadas.",
            "Auriculares inalámbricos con cancelación de ruido.",

        ];
        $stock = [
            15,  // Laptop para gaming
            50,  // Teclado mecánico RGB
            30,  // Mouse inalámbrico ergonómico
            25,  // Tablet de alta resolución
            40,  // Smartphone con cámara de alta calidad
            20,  // Monitor ultrawide
            60,  // Disco duro externo SSD
            100, // Cámara web
            80,  // Auriculares inalámbricos
            70,  // Altavoces Bluetooth portátiles
            35,  // Impresora multifuncional
            90,  // Router Wi-Fi de alta velocidad
            45,  // Smartwatch
            10,  // Televisor 4K
            // Gafas de realidad virtual
        ];
        $id = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
        ];
        return [
            "nombre" => $this->faker->randomElement($productos),
            'imagen' => $this->faker->randomElement($imagenes),
            "precio" => $this->faker->randomElement($precios),
            "descripcion" => $this->faker->randomElement($descripciones),
            "stock" => $this->faker->randomElement($stock),
            'vendedor_id' => $this->faker->randomElement($id)
        ];
    }
}
