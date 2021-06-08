<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Value::insert([
            ['country_id' => 1, 'key' => 'order_tax', 'slug' => 'Order Tax', 'value' => 50],
            ['country_id' => 1,'key' => 'order_percentage', 'slug' => 'Order Percentage', 'value' => 20],
        ]);
        Value::insert([
            ['country_id' => 2, 'key' => 'order_tax', 'slug' => 'Order Tax', 'value' => 500],
            ['country_id' => 2, 'key' => 'order_percentage', 'slug' => 'Order Percentage', 'value' => 200],
        ]);
    }
}
