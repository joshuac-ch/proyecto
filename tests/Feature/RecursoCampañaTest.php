<?php

namespace Tests\Feature;

use App\Models\emails;
use App\Models\campañas;
use App\Models\formularios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecursoCampañaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    /** @test */
    public function una_campaña_puede_tener_varios_recursos_asociados()
    {
        // Crear una campaña
        $campaña = campañas::factory()->create();

        // Crear y asociar un Email a la campaña
        $email = emails::factory()->create();
        $campaña->recursos()->create([
            'recursoable_id' => $email->id,
            'recursoable_type' => get_class($email),
        ]);

        // Crear y asociar un Form a la campaña
        $form = formularios::factory()->create();
        $campaña->recursos()->create([
            'recursoable_id' => $form->id,
            'recursoable_type' => get_class($form),
        ]);

        // Asegurar que la campaña tiene 2 recursos asociados
        $this->assertCount(2, $campaña->recursos);

        // Verificar que el primer recurso es de tipo Email
        $this->assertInstanceOf(emails::class, $campaña->recursos[0]->recursoable);

        // Verificar que el segundo recurso es de tipo Form
        // ESTO LO CAMBIE PARA QUE NO SALIERA ERROR
        // $this->assertInstanceOf(campañas::class, $campaña->recursos[1]->recursoable);
        $this->assertInstanceOf(formularios::class, $campaña->recursos[1]->recursoable);
        
    }
}
