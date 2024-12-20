<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\compannia;
use App\Models\contacto;
use App\Models\oportunidad;
use App\Models\plantillas;
use App\Models\producto;
use App\Models\User;
use App\Models\usuarios;
use App\Models\vendedor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
        usuarios::factory()->count(10)->create();
        admin::factory()->count(10)->create();
        vendedor::factory()->count(10)->create();
        producto::factory()->count(10)->create();
        compannia::factory()->count(10)->create();
        contacto::factory()->count(10)->create();
        oportunidad::factory()->count(10)->create();
        plantillas::factory()->count(3)->create();
    }
}
