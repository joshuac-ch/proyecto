<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class GeneratePrediction implements ShouldQueue
{
    use  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     */

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Ruta del script de Python en storage/app
        $scriptPath = "C:\www\Apache24\htdocs\c403laravel\storage\app\generar_predicciones.py"; //storage_path('app/generar_predicciones.py');

        // Ejecutar el script de Python
        $output = [];
        $return_var = 0;

        exec("Python $scriptPath");

        if ($return_var !== 0) {
            // Manejar el error según sea necesario
            return redirect()->route('admin.create');
        }
    }
}
