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

        Category::insert([
            ['name' => 'Electronic', 'image' => 'front/images/ele.png','handle'=>'Electronic','country_id'=>1],
            ['name' => 'Smartphones & Tablets', 'image' => 'front/images/sm.png','handle'=>'Smartphones&Tablets','country_id'=>1],
            ['name' => 'Computer & Office', 'image' => 'front/images/com.png','handle'=>'Computer&Office','country_id'=>1],
            ['name' => 'Home & lifestyle', 'image' => 'front/images/tv.png','handle'=>'Home&lifestyle','country_id'=>1],
            ['name' => 'Leather & Shoes', 'image' => 'front/images/shoe.png','handle'=>'Leather&Shoes','country_id'=>1],
            ['name' => 'Health & Beauty', 'image' => 'front/images/health.png','handle'=>'Health&Beauty','country_id'=>1],
            ['name' => 'Babies & Toys', 'image' => 'front/images/kid.png','handle'=>'Babies&Toys','country_id'=>1],
            ['name' => "Women's Fashion", 'image' => 'front/images/w-cloth.png','handle'=>"Women's_Fashion",'country_id'=>1],
            ['name' => "Men's Fashion", 'image' => 'front/images/m-cloth.png','handle'=>"Men's_Fashion",'country_id'=>1],
            ['name' => 'Watches, Bags & Jewelry', 'image' => 'front/images/watch.png','handle'=>'Watches_Bags&Jewelry','country_id'=>1],
            ['name' => 'Sports & Outdoor', 'image' => 'front/images/sport.png','handle'=>'Sports&Outdoor','country_id'=>1],
            ['name' => 'AutoMobiles', 'image' => 'front/images/car.png','handle'=>'AutoMobiles','country_id'=>1],
            ['name' => 'รถยนต์', 'image' => 'front/images/car.png','handle'=>'รถยนต์','country_id'=>2],
            ['name' => 'อิเล็กทรอนิกส์', 'image' => 'front/images/car.png','handle'=>'อิเล็กทรอนิกส์','country_id'=>2],
            ['name' => 'สมาร์ทโฟน', 'image' => 'front/images/car.png','handle'=>'สมาร์ทโฟน','country_id'=>2],
            ['name' => 'แฟชั่นผู้หญิง', 'image' => 'front/images/car.png','handle'=>'แฟชั่นผู้หญิง','country_id'=>2],
        ]);
    }
}
