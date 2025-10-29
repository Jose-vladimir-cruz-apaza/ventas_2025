<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 1000);
        $stock = $this->faker->numberBetween(0, 500);
        $stock_minimum = $this->faker->numberBetween(5, 50);

        return [
            'user_id' => User::factory(),
            'categorie_id' => Category::factory(),
            'provider_id' => $this->faker->optional()->randomElement(Provider::pluck('id')->toArray()),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->optional()->paragraph(),
            'cod_prod' => 'PROD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'specifications' => $this->faker->text(500),
            'stock_minimum' => $stock_minimum,
            'stock' => $stock,
            'imagen_url' => $this->faker->optional()->imageUrl(),
            'brand' => $this->faker->optional()->company(),
            'cant' => $this->faker->numberBetween(0, 100),
            'price' => $price,
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'active' => $this->faker->boolean(90), // 90% de probabilidad de estar activo
        ];
    }
}