<?php

namespace Database\Seeders;

use App\Models\NewsTicker;
use Illuminate\Database\Seeder;

class NewsTickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsTicker::insert([
            ['news' => 'Admin News/Announcments','country_id'=> 1],
            ['news' => 'Admin Thai News/Announcments','country_id'=> 2],
            ]);
    }
}
