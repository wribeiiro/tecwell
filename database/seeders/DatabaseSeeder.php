<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $category = Category::factory()->create([
            'title' => 'GPU',
            'description' => 'GPU'
        ]);

        Product::factory(6)->create([
            'category_id' => $category->id
        ]);
    }
}
