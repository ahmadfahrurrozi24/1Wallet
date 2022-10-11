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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Diandra Rifqi',
            'email' => 'diandra@gmail.com',
            "password" => "12345678",
            "balance" => 120000.00
        ]);

        \App\Models\Category::create([
            "name" => "Entertaiment" 
        ]);

        \App\Models\Record::create([
            "user_id" => 1,
            "category_id" => 1,
            "amount" => 20000.00
        ]);

    }
}
