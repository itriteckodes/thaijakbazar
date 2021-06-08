<?php

namespace Database\Seeders;

use App\Models\FlashSale;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FlashSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
            FlashSale::create([
                'product_id' => $i,
                'original_price' => 344*$i,
                'discount_price' => 166*$i,
                'end_time' =>Carbon::now()->addDay()
            ]);
        }

        for($i=24;$i<=30;$i++){
            FlashSale::create([
                'product_id' => $i,
                'original_price' => 344*$i,
                'discount_price' => 166*$i,
                'end_time' =>Carbon::now()->addDay()
            ]);
        }  
    }
}
