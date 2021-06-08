<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=20;$i++){
            Review::insert([
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'So again I am a first timer. Trying to learn the proper process of applying. But I love the dry flowers and gems.','created_at'=>'2021-02-17 14:06:49'],
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'Really pretty, I wish it came with more of the big gems. They’re really nice.','created_at'=>'2021-02-17 14:06:49'],
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'These glitters and gemstones elevated my nails to the next level. Glued on with Makartt rhinestone glue. Hasn’t moved one bit.','created_at'=>'2021-02-17 14:06:49'],
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'This is the ocean collection/ this is the autumn colored gel collection I haven’t designed with the beautiful oceanic collection yet ! Can’t Wait !','created_at'=>'2021-02-17 14:06:49'],
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'Great! The amount your paying is totally worth the amount of product you are receiving.','created_at'=>'2021-02-17 14:06:49'],
               ['product_id' => $i,'user_id' =>rand(1,10),'rating'=>rand(1,5),'comment'=>'I went from having no nail decor to a whole variety, just by getting this set. Everything is so vibrant and unique. Its true to life, and even more beautiful in person. I made these press ons just so I could show you guys how pretty everything is. The polygel I used is from Love Yourself, Seasonal Concertos, and House of Florists kits','created_at'=>'2021-02-17 14:06:49'],
               
            ]);
        }
    }
}
