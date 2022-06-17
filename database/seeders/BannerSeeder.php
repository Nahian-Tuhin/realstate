<?php
namespace Database\Seeders;
use App\Models\Brand;
use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecord = [
            ['title'=>'Banner One','alt'=>'banner-one','background_img'=>'default.png','banner_image'=>'default.png','status'=> 1],
            ['title'=>'Banner Two','alt'=>'banner-two','background_img'=>'default.png','banner_image'=>'default.png','status'=> 1],
            ['title'=>'Banner Three','alt'=>'banner-three','background_img'=>'default.png','banner_image'=>'default.png','status'=> 1],
            ['title'=>'Banner Four','alt'=>'banner-four','background_img'=>'default.png','banner_image'=>'default.png','status'=> 0]
        ];
        Banner::insert($bannerRecord);
    }
}
