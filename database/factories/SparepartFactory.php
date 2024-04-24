<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sparepart>
 */
class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'stock' => fake()->numberBetween(10, 100),
            'price' => fake()->numberBetween(100000, 1000000),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
