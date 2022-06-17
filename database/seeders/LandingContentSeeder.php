<?php

namespace Database\Seeders;

use App\Models\LandingContent;
use Illuminate\Database\Seeder;

class LandingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LandingContent = [
            [
                'title' => 'Our Values',
                'description' => 'Our technical solutions empower us to quickly bring bold ideas to market. We will continue to leverage new technology and innovate for the future.'
            ],
            [
                'title' => 'Our Strategy',
                'description' => 'Timeously execute select building projects, by utilising proactive management skills with carefully selected clients and consultants.'
            ],
            [
                'title' => 'Our Vision',
                'description' => 'Our diverse teams are problem-solvers and collaborate with our customers to solve their most difficult challenges.'
            ]
        ];
        LandingContent::insert($LandingContent);
    }
}
