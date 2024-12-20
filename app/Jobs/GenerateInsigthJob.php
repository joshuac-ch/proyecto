<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class GenerateInsigthJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Ejemplo de cálculo de porcentaje de oportunidades ganadas
        $totalOportunidades = DB::table('oportunidades')->count();
        $ganadas = DB::table('oportunidades')->where('estado', 'Ganado')->count();
        $porcentajeGanadas = $totalOportunidades > 0 ? ($ganadas / $totalOportunidades) * 100 : 0;

        // Guardar el insight en la base de datos o caché
        DB::table('insights')->updateOrInsert(
            ['tipo' => 'porcentaje_ganadas'],
            ['valor' => $porcentajeGanadas, 'updated_at' => now()]
        );

        // Puedes añadir más cálculos para otros insights aquí
    }
}
