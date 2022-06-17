<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminsRecord = [
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
        DB::table('admins')->insert($adminsRecord);
    }
}
