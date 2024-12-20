<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\plantillas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\plantillas>
 */
class plantillasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $asunto = [
            " Laptop Gaming",
            "Seguimiento a Nuestras Conversaciones",
            " Necesito Tu Retroalimentación"
        ];
        $plantilla = [
            "Hola NOMBRE APELLIDO,\n\nHe intentado comunicarme contigo varias veces para discutir algunas sugerencias sobre cómo mejorar pero no he recibido respuesta. Esto me indica una de tres cosas:\n\n1) Estás satisfecho con y debería dejar de molestar.\n\n2) Aún estás interesado, pero no has tenido tiempo para responder.\n\n3) Te has caído y no puedes levantarte; en ese caso, házmelo saber y llamaré a alguien para que te ayude…\n\nPor favor, infórmame cuál es la situación, ya que estoy empezando a preocuparme.\n\nSaludos,\n",

            "Hola CORREO,\n\nHe intentado ponerme en contacto contigo varias veces para hablar sobre algunas ideas que podrían beneficiar a pero no he recibido respuesta. Esto podría significar una de tres cosas:\n\n1) Estás contento con y no necesitas más información.\n\n2) Aún estás considerando las opciones, pero no has tenido tiempo para responder.\n\n3) Estás en una situación complicada y necesitarías ayuda; si es así, házmelo saber.\n\nAgradecería que me informaras sobre tu situación, ya que me gustaría seguir apoyándote.\n\nAtentamente,\n",

            "1: Laptop Gaming
            Nombre del Producto: Laptop Gaming Acer Nitro 5
            Categoría: Electrónica
            Marca: Acer
            Modelo: Nitro 5 AN515-58
            Descripción: Laptop de alto rendimiento especialmente diseñada para gamers. Con un potente procesador Intel Core i7 de 12ª generación, 16 GB de RAM y una tarjeta gráfica NVIDIA GeForce RTX 3060, este dispositivo es ideal para jugar los títulos más exigentes y trabajar en tareas de alto rendimiento. Su pantalla de 15.6 pulgadas con tasa de refresco de 144Hz garantiza una experiencia visual fluida y envolvente.
            Precio: $1,299.99
            Características Principales:

            Procesador Intel Core i7 (12ª generación)
            Tarjeta gráfica NVIDIA GeForce RTX 3060
            16 GB de RAM
            Pantalla Full HD 15.6” 144Hz
            Almacenamiento SSD de 512 GB
            Disponibilidad: En stock"

        ];
        $name = ["joshua gustavo condorena", "nino nakano     "];
        return [
            "nombre" => $this->faker->randomElement($name),
            'asunto' => $this->faker->randomElement($asunto),
            'Descripcion' => $this->faker->randomElement($plantilla),

        ];
    }
}
