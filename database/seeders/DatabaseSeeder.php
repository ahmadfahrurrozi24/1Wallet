<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Role::create([
            "name" => "ADMINISTRATOR"
        ]);

        \App\Models\Role::create([
            "name" => "USER"
        ]);

        \App\Models\User::create([
            'name' => 'Diandra Rifqi',
            'email' => 'diandra@gmail.com',
            "password" => '$2y$10$lyHoIWuzoQ1n3yFTd83F1e7ajzCEMXRkzMXaCwQZWYFUlL2VFowfa',
            "role_id" => 1,
            "current_balance" => 120000,
            "first_balance" => 120000
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Type::create([
            "name" => "EXPENSE"
        ]);

        \App\Models\Type::create([
            "name" => "INCOME"
        ]);

        \App\Models\Category::create([
            "type_id" => 1,
            "name" => "Food & Beverage",
            "icon" => "bx bx-bowl-rice"
        ]);

        \App\Models\Category::create([
            "type_id" => 2,
            "name" => "Salary",
            "icon" => "bx bx-money"
        ]);
        \App\Models\Category::create([
            "type_id" => 1,
            "name" => "Water Bill",
            "icon" => "bx bx-water"
        ]);

        \App\Models\Category::create([
            "type_id" => 2,
            "name" => "Income Transfer",
            "icon" => "bx bx-transfer"
        ]);

        \App\Models\Category::create([
            "type_id" => 1,
            "name" => "Transportation",
            "icon" => "bx bx-car"
        ]);

        \App\Models\Category::create([
            "type_id" => 2,
            "name" => "Other Income",
            "icon" => "bx bx-package"
        ]);

        \App\Models\Record::create([
            "user_id" => 1,
            "category_id" => 1,
            "amount" => -20000,
            "note" => "beli makan",
            "date" => now()
        ]);

        \App\Models\Record::factory(100)->create();
    }
}
