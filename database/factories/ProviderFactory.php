<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'company' => $this->faker->company(),
            'contact' => $this->faker->optional()->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->optional()->safeEmail(),
            'direction' => $this->faker->address(),
            'NIT' => $this->faker->unique()->numerify('##############'), // 14 dígitos
        ];
    }
}