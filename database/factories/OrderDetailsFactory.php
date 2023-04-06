<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::all()->random();
        $quantity = fake()->numberBetween(1, 10);
        return [
            'order_id' => Order::all()->random()->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'amount' => $product->price * $quantity,
        ];
    }
}
