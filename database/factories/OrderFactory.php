<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "customer"); })->get()->random()->id,
            'status' => fake()->randomElement(['pending', 'confirmed', 'delivered', 'cancelled', 'denied']),
            'comments' => fake()->boolean(50) ? fake()->text(100) : null,
        ];
    }
}
