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
            ['name' => 'อิเล็กทรอนิกส์', 'image' => 'front/images/ele.png','handle'=>'อิเล็กทรอนิกส์','country_id'=>2],
            ['name' => 'สมาร์ทโฟนและแท็บเล็ต', 'image' => 'front/images/sm.png','handle'=>'สมาร์ทโฟนและแท็บเล็ต','country_id'=>2],
            ['name' => 'คอมพิวเตอร์และสำนักงาน', 'image' => 'front/images/com.png','handle'=>'คอมพิวเตอร์และสำนักงาน','country_id'=>2],
            ['name' => 'บ้านและไลฟ์สไตล์', 'image' => 'front/images/tv.png','handle'=>'บ้านและไลฟ์สไตล์','country_id'=>2],
            ['name' => 'รองเท้าหนัง', 'image' => 'front/images/shoe.png','handle'=>'รองเท้าหนัง','country_id'=>2],
            ['name' => 'สุขภาพและความงาม', 'image' => 'front/images/health.png','handle'=>'สุขภาพและความงาม','country_id'=>2],
            ['name' => 'ทารกและของเล่น', 'image' => 'front/images/kid.png','handle'=>'ทารกและของเล่น','country_id'=>2],
            ['name' => "แฟชั่นสตรี", 'image' => 'front/images/w-cloth.png','handle'=>"แฟชั่นสตรี",'country_id'=>2],
            ['name' => "แฟชั่นผู้ชาย", 'image' => 'front/images/m-cloth.png','handle'=>"แฟชั่นผู้ชาย",'country_id'=>2],
            ['name' => 'นาฬิกา กระเป๋า และเครื่องประดับ', 'image' => 'front/images/watch.png','handle'=>'นาฬิกา กระเป๋า และเครื่องประดับ','country_id'=>2],
            ['name' => 'กีฬาและกิจกรรมกลางแจ้ง', 'image' => 'front/images/sport.png','handle'=>'กีฬาและกิจกรรมกลางแจ้ง','country_id'=>2],
            ['name' => 'รถยนต์', 'image' => 'front/images/car.png','handle'=>'รถยนต์','country_id'=>2],
            
        ]);
    }
}
