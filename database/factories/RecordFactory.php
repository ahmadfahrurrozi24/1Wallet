<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => fake()->numberBetween(1, 11),
            "category_id" => fake()->numberBetween(1, 2),
            "amount" => fake()->numberBetween(20000, 100000)
        ];
    }
}
