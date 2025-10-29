<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {        
        Product::factory()->count(5)->create();

        $this->command->info('5 productos creados exitosamente!');
    }
}