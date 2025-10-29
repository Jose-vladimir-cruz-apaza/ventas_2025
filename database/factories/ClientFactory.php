<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->optional()->randomElement(User::pluck('id')->toArray()),
            'last_name' => $this->faker->lastName(),
            'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->optional()->phoneNumber(),
            'direction' => $this->faker->optional()->address(),
            'active' => $this->faker->boolean(85), // 85% de probabilidad de estar activo
        ];
    }
}