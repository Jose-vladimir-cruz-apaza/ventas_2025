<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 20 proveedores
        Provider::factory()->count(5)->create();

        $this->command->info('5 proveedores creados exitosamente!');
    }
}