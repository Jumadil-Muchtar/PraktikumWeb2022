<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'address' =>fake()->address(),
            'gender' => fake()->randomElement(['Pria','Wanita']),
            'no_hp' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['Aktif','Tidak aktif'])
        ];
    }
}
