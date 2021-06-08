<?php

namespace Database\Seeders;

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
        Banner::insert([
            ['product_id' => rand(1,5), 'end_time'=>'2021-06-22 15:58:00', 'image'=>'images/banner/1.png'],
            ['product_id' => rand(5,8), 'end_time'=>'2021-06-22 15:58:00', 'image'=>'images/banner/2.png'],
            ['product_id' => rand(9,16), 'end_time'=>'2021-06-22 15:58:00', 'image'=>'images/banner/3.png'],
        ]);
    }
}
