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
            'name' => fake()->word(),
            'category_id' => random_int(1,6),
            'price' => fake()->randomNumber(6, true),
            'status' => fake()->randomElement([
                'Terkirim', 'Belum terkirim'
            ])
        ];
    }
}
