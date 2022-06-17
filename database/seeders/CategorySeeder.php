<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoryRecord = [
            [
                'title' => 'Apartment',
                'slug' => 'apartment',
                'meta_title' => 'meta_title',
                'status' => 1
            ],
            [
                'title' => 'Duplexes',
                'slug' => 'duplexes',
                'meta_title' => 'show-room meta title',
                'status' => 1
            ],
            [
                'title' => 'Whole Buildings',
                'slug' => 'whole-Building',
                'meta_title' => 'show-room meta title',
                'status' => 1
            ]
        ];
        Category::insert($categoryRecord);
    }
}
