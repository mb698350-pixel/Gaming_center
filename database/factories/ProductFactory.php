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
    public function definition(): array
    {
        return [         
            'name' => fake()->words(3, true), // نام محصول
            'category_id' => fake()->numberBetween(2,5),
            'price' => fake()->numberBetween(100_000, 5_000_000),
            'weight' => fake()->numberBetween(0.1, 10), // گرم
            'inventory' => fake()->numberBetween(0, 50),
            'image'=>'none_images.png',

        ];
    }
}
