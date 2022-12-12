<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $sellers = DB::table('sellers')->pluck('id');
        $categories = DB::table('categories')->pluck('id');

        return [
            'name'=>fake()->words(3, true),
            'status'=>fake()->randomElement(['Available','Out of Stock']),
            'price'=> fake()->randomNumber(5, false),
            'seller_id'=>fake()->randomElement($sellers),
            'category_id'=>fake()->randomElement($categories)
        ];
    }
}
