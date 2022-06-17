<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //
    $prdRecord = [
        [
            'category_id' => 1,
            'admin_id' => 1,
            'title' => 'Fully Furnished with Balcony | Welcoming',
            'slug' => 'proper-slug-one-here',
            'price' => '0.00',
            'size_sqft' => 1000,
            'address' => 'Dhaka',
            'image' => 'default.png',
            'bedroom' => 2,
            'bathroom' => 1,
            'is_ongoing' => 'ongoing',
            'rental_period' => 'Yearly',
            'description' => 'Fully Furnished with Balcony | Welcoming',
            'meta_title' => 'Fully Furnished with Balcony | Welcoming',
            'meta_description' => 'Fully Furnished with Balcony | Welcoming',
            'meta_keyword' => 'Furnished apartment, ready apartment',
            'status' => 1
        ],
        [
            'category_id' => 1,
            'admin_id' => 2,
            'title' => 'Fully Furnished Apartment',
            'slug' => 'proper-slug-two-here',
            'price' => 1000000.00,
            'address' => 'Sylhet',
            'size_sqft' => '1000',
            'image' => 'default.png',
            'bedroom' => 2,
            'bathroom' => 1,
            'is_ongoing' => 'ready',
            'rental_period' => 'Monthly',
            'description' => 'Fully Furnished with Balcony | Welcoming',
            'meta_title' => 'Fully Furnished with Balcony | Welcoming',
            'meta_description' => 'Fully Furnished with Balcony | Welcoming',
            'meta_keyword' => 'Furnished apartment, ready apartment',
            'status' => 1
        ],

    ];
    Property::insert($prdRecord);
}
}
