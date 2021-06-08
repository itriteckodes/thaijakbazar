<?php

namespace Database\Seeders;

use App\Models\WithdrawMethod;
use Illuminate\Database\Seeder;

class WithdrawMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WithdrawMethod::insert([
           
            ['name' => 'Easy Paisa', 'image' => 'images/gateway/easypaisa.jpg','country_id'=>1],
            ['name' => 'Jazz Cash', 'image' => 'images/gateway/jazzcash.jpg','country_id'=>1],
            ['name' => 'Bank', 'image' => 'images/gateway/bankwithdraw.png','country_id'=>1],

            ['name' => ' ThaiBank', 'image' => 'images/gateway/bankwithdraw.png','country_id'=>2],
            
        ]);
    }
}
