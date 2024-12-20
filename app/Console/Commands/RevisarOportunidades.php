<?php

namespace App\Console\Commands;

use App\Models\noti_sis;
use App\Models\oportunidad;
use Illuminate\Console\Command;
use Carbon\Carbon;

class RevisarOportunidades extends Command
{
    protected $signature = 'oportunidades:revisar';
    protected $description = 'Revisa las oportunidades y genera notificaciones si la fecha estimada ha expirado.';

    public function handle()
    {
        $hoy = Carbon::now();

        // Obtener todas las oportunidades con fecha estimada vencida
        $oportunidades = oportunidad::where('fecha_estimada', '<', $hoy)
            ->where('estado', '!=', 'cerrada') // Opcional: Excluir oportunidades ya cerradas
            ->get();

        foreach ($oportunidades as $oportunidad) {
            // Crear una notificación para el vendedor asociado
            noti_sis::create([
                'mensaje' => "La oportunidad #{$oportunidad->id} ha pasado su fecha estimada.",
                'usuario_id' => $oportunidad->vendedor_id,
            ]);

            // Opcional: Cambiar el estado de la oportunidad
            $oportunidad->estado = 'vencida';
            $oportunidad->save();
        }

        $this->info('Oportunidades revisadas y notificaciones generadas.');
    }
}
