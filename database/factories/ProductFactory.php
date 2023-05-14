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
        $data = now()->add(- rand(1 , 30) , 'day');
        return [ 
            'shop_id' => $this->faker->randomElement([1, 2]),
            'title' => fake()->text(5,10),
            'price' => rand(10 , 100) * 1000,
            'discount' => rand(0, 5) * 5,
            'Row_material' => fake()->text(rand(1,4)*50),  
            'created_at' => $data,
            'updated_at' => $data,    
        ];
    }
}
