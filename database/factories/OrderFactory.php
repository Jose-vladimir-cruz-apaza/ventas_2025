<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $subtotal = $this->faker->randomFloat(2, 10, 1000);
        $precio = $this->faker->randomFloat(2, 15, 1200);
        $total = $this->faker->randomFloat(2, 20, 1500);

        return [
            'number_order' => 'ORD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'status' => $this->faker->randomElement(['pending', 'proceccing']),
            'total' => $total,
            'precio' => $precio,
            'subtotal' => $subtotal,            
            'description' => $this->faker->text(200),
            'user_id' => User::factory(),
        ];
    }
}