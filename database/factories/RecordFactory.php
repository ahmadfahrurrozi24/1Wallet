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
        $category_id = fake()->numberBetween(1, 2);
        $amount = 0;

        if ($category_id == 1) {
            $amount = fake()->numberBetween(-100000, -20000);
        } else {
            $amount = fake()->numberBetween(20000, 100000);
        }

        return [
            "user_id" => fake()->numberBetween(1, 11),
            "category_id" => $category_id,
            "amount" => $amount,
            "note" => fake()->text(50),
            "date" => now()
        ];
    }
}
