<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $product_name=$this->faker->unique()->words($nb=2,$asText = true);
        $slug= Str::slug($product_name);
        $image_name = $this->faker->numberBetween(1,20).'.jpg';
        return [
            'name' =>Str::title($product_name),
            'slug'=>$slug,
            'description' =>$this->faker->text(400),
            'price' =>$this->faker->numberBetween(1,22),
            'sku' =>'smd'.$this->faker->numberBetween(100,500),
            'quantity'=> $this->faker->numberBetween(100,200),
            'image' => $image_name,
            'brand_id'=>$this->faker->numberBetween(1,5),
            'category_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
