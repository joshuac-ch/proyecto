<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schedule;

class kernel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kernel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
    protected function schedule(Schedule $schedule)
    {
        // $schedule->job(new \App\Jobs\GenerateInsigthJob)->daily();
        //$schedule->command('oportunidades:revisar')->daily(); // Ejecutar diariamente
    }
}
