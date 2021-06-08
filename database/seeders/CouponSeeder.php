<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::insert([
            ['name' => 'abc', 'code'=>'123', 'rate'=>'5' ,'vendor_id'=> rand(1,10),'country_id' => 1],
            ['name' => 'xyz', 'code'=>'321', 'rate'=>'10','vendor_id'=> rand(1,10),'country_id' => 1],
            ['name' => 'abc', 'code'=>'456', 'rate'=>'15','vendor_id'=> rand(1,10),'country_id' => 1]
        ]);
            
    }
}
