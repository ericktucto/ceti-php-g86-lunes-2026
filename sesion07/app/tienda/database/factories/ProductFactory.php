<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
#[UseModel(Product::class)]
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
            'name' => join(' ', fake()->words()),
            'price' => fake()->randomElement([3000, 3750, 6500, 9000, 1200, 3600]),
        ];
    }
}
