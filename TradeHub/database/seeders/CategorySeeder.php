<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Electronics', 'slug' => 'electronics']);
        Category::create(['name' => 'Fashion', 'slug' => 'fashion']);
        Category::create(['name' => 'Home & Living', 'slug' => 'home-living']);
        Category::create(['name' => 'Sports', 'slug' => 'sports']);
        Category::create(['name' => 'Toys & Hobbies', 'slug' => 'toys-hobbies']);
    }
}
