<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothing>
 */
class ClothingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word().rand(0, 99),
            'price' => fake()->numberBetween(300, 3000),
            'discount' => 0,
            'discount_price' => 0,
            'status_id' => 0,
            'category_id' => fake()->numberBetween(1, 4),
            'cat_size_id' => 3,
            'brand_id' => fake()->numberBetween(1, 10),
        ];
    }
}
