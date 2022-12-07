<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller_permission>
 */
class Seller_permissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sellers = DB::table('sellers')->pluck('id');
        $permissions = DB::table('permissions')->pluck('id');

        return [
            'seller_id'=>fake()->randomElement($sellers),
            'permission_id'=>fake()->randomElement($permissions)
        ];
    }
}
