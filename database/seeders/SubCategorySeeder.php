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
            ['name' => 'Mobile Accessories','cat_id'=>2,'handle' =>'Mobile_Accessories','country_id'=>1],  
            ['name' => 'Audio','cat_id'=>1,'handle' =>'Audio','country_id'=>1],  
            ['name' => 'Mobiles','cat_id'=>2,'handle' =>'Mobiles','country_id'=>1],  
            ['name' => 'Tablets','cat_id'=>2,'handle' =>'Tablets','country_id'=>1],   
            ['name' => 'Laptops','cat_id'=>3,'handle' =>'Laptops','country_id'=>1],   
            ['name' => 'Desktops','cat_id'=>3,'handle' =>'Desktops','country_id'=>1],   
            ['name' => 'Gamming Consoles','cat_id'=>3,'handle' =>'Gamming_Consoles','country_id'=>1],   
            ['name' => 'Audio/Video Cameras','cat_id'=>1,'handle' =>'Audio_Video_Cameras','country_id'=>1],   
            ['name' => 'Security Cameras','cat_id'=>1,'handle' =>'Security_Cameras','country_id'=>1],   
            ['name' => 'Wearable','cat_id'=>8,'handle' =>'Wearable','country_id'=>1],   
            ['name' => 'Console Ascessories','cat_id'=>3,'handle' =>'Console_Ascessories','country_id'=>1],   
            ['name' => 'Computer Accessories','cat_id'=>3,'handle' =>'Computer_Accessories','country_id'=>1],
            ['name' => 'Storage','cat_id'=>3,'handle' =>'Storage','country_id'=>1],
            ['name' => 'Printers','cat_id'=>3,'handle' =>'Printers','country_id'=>1],
            ['name' => 'Computer Components','cat_id'=>3,'handle' =>'Computer_Components','country_id'=>1],
            ['name' => 'Network Components','cat_id'=>3,'handle' =>'Network_Components','country_id'=>1],
            ['name' => 'Bath & Body','cat_id'=>6,'handle' =>'Bath&Body','country_id'=>1],
            ['name' => 'Beauty Tools','cat_id'=>6,'handle' =>'Beauty_Tools','country_id'=>1],
            ['name' => 'Fragrances','cat_id'=>6,'handle' =>'Fragrances','country_id'=>1],
            ['name' => 'Hair Care','cat_id'=>6,'handle' =>'Hair_Care','country_id'=>1],
            ['name' => 'Makeup','cat_id'=>6,'handle' =>'Makeup','country_id'=>1],
            ['name' => "Men's Care",'cat_id'=>6,'handle' =>"Men's_Care",'country_id'=>1],
            ['name' => 'Personal Care','cat_id'=>6,'handle' =>'Personal_Care','country_id'=>1],
            ['name' => 'Skin Care','cat_id'=>6,'handle' =>'Skin_Care','country_id'=>1],
            ['name' => 'Sexual Wellness','cat_id'=>6,'handle' =>'Sexual_Wellness','country_id'=>1],
            ['name' => 'Toys & Games','cat_id'=>7,'handle' =>'Toys&Games','country_id'=>1],
            ['name' => 'Diapering & Potty','cat_id'=>7,'handle' =>'Diapering&Potty','country_id'=>1],
            ['name' => 'Feeding','cat_id'=>7,'handle' =>'Feeding','country_id'=>1],
            ['name' => 'Baby Gear','cat_id'=>7,'handle' =>'Baby_Gear','country_id'=>1],
            ['name' => 'Sports & Outdoor Play','cat_id'=>7,'handle' =>'Sports&Outdoor_Play','country_id'=>1],
            ['name' => 'Nursery','cat_id'=>7,'handle' =>'Nursery','country_id'=>1],
            ['name' => 'Baby Personal Care','cat_id'=>7,'handle' =>'Baby_Personal_Care','country_id'=>1],
            ['name' => 'Milk Formula & Baby food','cat_id'=>7,'handle' =>'Milk_Formula&Baby_food','country_id'=>1],
            ['name' => 'Baby & Toddler Toys','cat_id'=>7,'handle' =>'Baby&Toddler_Toys','country_id'=>1],
            ['name' => 'Remote Control & Vehicles','cat_id'=>7,'handle' =>'Remote_Control&Vehicles','country_id'=>1],
            ['name' => 'Clothing & Accessories','cat_id'=>7,'handle' =>'Clothing&Accessories','country_id'=>1],
            ['name' => 'Bath','cat_id'=>4,'handle' =>'Bath','country_id'=>1],
            ['name' => 'Bedding','cat_id'=>4,'handle' =>'Bedding','country_id'=>1],
            ['name' => 'Decor','cat_id'=>4,'handle' =>'Decor','country_id'=>1],
            ['name' => 'Kitchen & Dining','cat_id'=>4,'handle' =>'Kitchen&Dining','country_id'=>1],
            ['name' => 'Shoes','cat_id'=>5,'handle' =>'Shoes','country_id'=>1]
            ]);
    }
}
