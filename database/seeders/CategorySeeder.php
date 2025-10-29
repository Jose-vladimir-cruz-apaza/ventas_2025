<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Crear las 3 categorías específicas
        $categories = [
            [
                'name' => 'Computadoras',
                'description' => 'Equipos de computación, laptops, PCs de escritorio y accesorios',
                'state' => 'activo'
            ],
            [
                'name' => 'Electrodomésticos',
                'description' => 'Electrodomésticos para el hogar y la oficina',
                'state' => 'activo'
            ],
            [
                'name' => 'Componentes electronicos',
                'description' => 'Componentes y partes electrónicas para reparación y proyectos',
                'state' => 'activo'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('3 categorías creadas exitosamente!');
        $this->command->info('- Computadoras');
        $this->command->info('- Electrodomésticos'); 
        $this->command->info('- Componentes electronicos');
    }
}