<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->numberBetween(1, 20),
            'sparepart_id' => fake()->numberBetween(1, 40),
            'qty' => fake()->numberBetween(1, 20),
            'subtotal' => fake()->numberBetween(100000, 10000000)
        ];
    }
}
