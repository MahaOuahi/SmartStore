<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Ebooks',
            'slug' => 'ebooks'
        ]);

        Category::create([
            'name' => 'Smartphones',
            'slug' => 'smartphones'
        ]);

        Category::create([
            'name' => 'Smart Watches',
            'slug' => 'smart-watches'
        ]);

        Category::create([
            'name' => 'Laptops',
            'slug' => 'laptops'
        ]);

        Category::create([
            'name' => 'Games',
            'slug' => 'games'
        ]);
    }
}
