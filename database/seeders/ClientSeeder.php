<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 20 clientes
        Client::factory()->count(5)->create();

        $this->command->info('5 clientes creados exitosamente!');
    }
}