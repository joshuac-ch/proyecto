<?php

namespace Database\Seeders;

use App\Models\historias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ImportVentasHistoricasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cargar el archivo JSON
        $json = File::get(storage_path('/app/datos_entrenados.json'));
        $data = json_decode($json, true);

        // Iterar sobre cada registro y guardarlo en la base de datos
        foreach ($data as $venta) {
            historias::create([
                'monto_oportunidad' => $venta['monto_oportunidad'],
                'tiempo_oportunidad_dias' => $venta['tiempo_oportunidad_dias'],
                'numero_interacciones' => $venta['numero_interacciones'],
                'sector_cliente' => $venta['sector_cliente'],
                'productos_ofrecidos' => $venta['productos_ofrecidos'], // Asegúrate de convertirlo a JSON si es necesario
                'region_cliente' => $venta['region_cliente'],
                'estado_oportunidad' => $venta['estado_oportunidad'],
                'canal_contacto' => $venta['canal_contacto'],
                'interacciones_previas' => $venta['interacciones_previas'],
                'presupuesto_cliente' => $venta['presupuesto_cliente'],
            ]);
        }
    }
}
