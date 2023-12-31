<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(rand(1, 2), true),
            'CEO' => fake()->name(),
            'year' => $this->faker->year(),
            'country' => $this->faker->randomElement(['USA', 'France', 'Japan']),
        ];
    }
}
