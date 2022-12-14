<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=> 'fashion_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
    public function definition1()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=> 'furniture_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
    public function definition2()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=> 'kidtoy_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
    public function definition3()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=>'tools_equipment_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
    public function definition4()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=> 'organics_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
    public function definition5()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(100),
            'description'=> $this->faker->text(300),
            'regular_price'=> $this->faker->numberBetween(10,200),
            'stock_status'=> 'instock',
            'quantity'=>$this->faker->numberBetween(20,200),
            'image'=> 'digital_' .$this->faker->unique()->numberBetween(1,50).'.jpg',
            // 'image'=> 'digital_','fashion_','furniture_','kidtoy_','tools_equipment_','organics_'.$this->faker->unique()->numberBetween(1,50).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
