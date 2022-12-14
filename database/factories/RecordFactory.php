<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $category_id = fake()->numberBetween(1, 6);
        $amount = 0;

        if ($category_id == 1 || $category_id == 3 || $category_id == 5) {
            $amount = fake()->numberBetween(-100000, -20000);
        } else {
            $amount = fake()->numberBetween(20000, 100000);
        }

        return [
            // "user_id" => fake()->numberBetween(1, 11),
            "user_id" => 1,
            "category_id" => $category_id,
            "amount" => $amount,
            "note" => fake()->text(50),
            "date" => fake()->dateTimeBetween(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek())
        ];
    }
}
