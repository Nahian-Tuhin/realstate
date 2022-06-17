<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'title' => 'HVAC',
                'slug' => 'HVAC',
                'description' => 'Chilled water system including AHU , Chillers, Pumps etc . Also standalone units , package units',
                'status' => 1
            ],
            [
                'title' => 'Ducting Works',
                'slug' => 'ducting-works',
                'description' => 'A duct installer work involves section cutting to assemble commercial rigid air conditioning duct work / systems',
                'status' => 0
            ],
        ];
        Service::insert($categoryRecord);
    }
}
