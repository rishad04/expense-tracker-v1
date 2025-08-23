<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_arr = [
            [
                'title'     => 'Food',
                'slug'      => 'food',
                'position'  => 1
            ],
            [
                'title'     => 'Transport',
                'slug'      => 'transport',
                'position'  => 2
            ],
            [
                'title'     => 'Shopping',
                'slug'      => 'shopping',
                'position'  => 3
            ],
            [
                'title'     => 'Other',
                'slug'      => 'other',
                'position'  => 199
            ],

        ];

        foreach ($category_arr as $category) {
            Category::create($category);
        }
    }
}
