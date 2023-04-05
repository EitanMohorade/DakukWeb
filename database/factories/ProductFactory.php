<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            "name" => fake()->name(),
            "category_id" => fake()->numberBetween(1, 66),
            "image" => fake()->imageUrl(400, 400),
            "description" => fake()->text(300),
            "stock" => fake()->numberBetween(0, 3000),
            "price" => fake()->numberBetween(100, 20000),
        ];
    }
}
