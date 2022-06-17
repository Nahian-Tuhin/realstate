<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $usersRecord = [
            [
                'name' => 'Super Admin', 'mobile' => '01744894452',
                'email' => 'property@ibasuae.com', 'password' => Hash::make('12345678'),
                'status' => 1
            ],
            [
                'name' => 'Super Admin', 'mobile' => '01531261214',
                'email' => 'mep@ibasuae.com', 'password' => Hash::make('12345678'),
                'status' => 1
            ],
        ];
        DB::table('users')->insert($usersRecord);
    }
}
