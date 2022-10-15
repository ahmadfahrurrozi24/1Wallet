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
            "name" => "food & Beverage",
            "icon" => "fa-solid fa-martini-glass"
        ]);

        \App\Models\Category::create([
            "type_id" => 2,
            "name" => "Salary",
            "icon" => "fa-solid fa-sack-dollar"
        ]);

        \App\Models\Record::create([
            "user_id" => 1,
            "category_id" => 1,
            "amount" => -20000
        ]);

        \App\Models\Record::factory(100)->create();
    }
}
