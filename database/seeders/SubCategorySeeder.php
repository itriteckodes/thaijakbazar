<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::insert([
            ['name' => 'อุปกรณ์เสริมมือถือ','cat_id'=>2,'handle' =>'อุปกรณ์เสริมมือถือ','country_id'=>2],  
            ['name' => 'เครื่องเสียง','cat_id'=>1,'handle' =>'เครื่องเสียง','country_id'=>2],  
            ['name' => 'โทรศัพท์มือถือ','cat_id'=>2,'handle' =>'โทรศัพท์มือถือ','country_id'=>2],  
            ['name' => 'แท็บเล็ต','cat_id'=>2,'handle' =>'แท็บเล็ต','country_id'=>2],   
            ['name' => 'Laptops','cat_id'=>3,'handle' =>'แล็ปท็อป','country_id'=>2],   
            ['name' => 'แล็ปท็อป','cat_id'=>3,'handle' =>'แล็ปท็อป','country_id'=>2],   
            ['name' => 'คอนโซลเกม','cat_id'=>3,'handle' =>'คอนโซลเกม','country_id'=>2],   
            ['name' => 'กล้องเสียง/วิดีโอ','cat_id'=>1,'handle' =>'กล้องเสียง/วิดีโอ','country_id'=>2],   
            ['name' => 'กล้องรักษาความปลอดภัย','cat_id'=>1,'handle' =>'กล้องรักษาความปลอดภัย','country_id'=>2],   
            ['name' => 'สวมใส่ได้','cat_id'=>8,'handle' =>'สวมใส่ได้','country_id'=>2],   
            ['name' => 'อุปกรณ์เสริมคอนโซล','cat_id'=>3,'handle' =>'อุปกรณ์เสริมคอนโซล','country_id'=>2],
            ['name' => 'ส่วนประกอบเครือข่าย','cat_id'=>3,'handle' =>'ส่วนประกอบเครือข่าย','country_id'=>2],
            ['name' => 'อาบน้ำและผิวกาย','cat_id'=>6,'handle' =>'อาบน้ำและผิวกาย','country_id'=>2],
            ['name' => 'แต่งหน้า','cat_id'=>6,'handle' =>'แต่งหน้า','country_id'=>2],
            ['name' => 'เนอสเซอรี่','cat_id'=>7,'handle' =>'เนอสเซอรี่','country_id'=>2],
            ['name' => 'รีโมทคอนโทรลและยานพาหนะ','cat_id'=>7,'handle' =>'รีโมทคอนโทรลและยานพาหนะ','country_id'=>2],
            ['name' => 'เสื้อผ้าและเครื่องประดับ','cat_id'=>7,'handle' =>'เสื้อผ้าและเครื่องประดับ','country_id'=>2],
            ['name' => 'ตกแต่ง','cat_id'=>4,'handle' =>'ตกแต่ง','country_id'=>2],
            ['name' => 'ห้องครัวและห้องอาหาร','cat_id'=>4,'handle' =>'ห้องครัวและห้องอาหาร','country_id'=>2],
            ['name' => 'รองเท้า','cat_id'=>5,'handle' =>'รองเท้า','country_id'=>2]
            ]);
    }
}
