<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::create([
            'name' => 'Chocolate',
            'price' => 20,
            'point' => 10,
            'stock' => 100,
        ]);
        Product::create([
            'name' => 'SoftDrink',
            'price' => 10,
            'point' => 5,
            'stock' => 100,
        ]);

    }
}
