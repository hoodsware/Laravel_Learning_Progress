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
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->realText($maxNbChars = 50),
            'price' => $this->faker->numberBetween($min=10, $max=100)
        ];
        // return [
        //     'name' => 'Name of the product',
        //     'description' => 'Body of the description',
        //     'price' => 2.00
        // ];
    }
}
