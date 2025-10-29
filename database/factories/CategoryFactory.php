<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            [
                'name' => 'Computadoras',
                'description' => 'Equipos de computación, laptops, PCs de escritorio y accesorios'
            ],
            [
                'name' => 'Electrodomésticos', 
                'description' => 'Electrodomésticos para el hogar y la oficina'
            ],
            [
                'name' => 'Componentes electronicos',
                'description' => 'Componentes y partes electrónicas para reparación y proyectos'
            ]
        ];

        $category = $this->faker->randomElement($categories);

        return [
            'name' => $category['name'],
            'description' => $category['description'],
            'state' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}