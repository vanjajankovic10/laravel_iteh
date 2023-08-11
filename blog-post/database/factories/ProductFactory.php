<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(rand(1, 3), true),
            'purpose' => $this->faker->randomElement(['cleanser', 'toner', 'spf', 'moisturizer']),
            'skin_type' => $this->faker->randomElement(['normal', 'dry', 'combination', 'oily']),
            'brand_id' => Brand::factory(),
            'user_id' => User::factory(),
        ];
    }
}
