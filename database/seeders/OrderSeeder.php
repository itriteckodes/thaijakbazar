<?php

namespace Database\Seeders;

use App\Helpers\OrderStatus;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $order =  Order::create([
            'user_id' => 1,
            'vendor_id' => 1,
            'name' => 'user',
            'email' => 'user@mail.com',
            'phone' =>'654654',
            'city' => 'dummy city',
            'address' => 'address comes here',
            'subtotal' => '17847',
            'shipping' => '100',
            'tax' => '52',
            'discount' => '15',
            'grand_total' => '17984',
            'status' => OrderStatus::pending(),
            'gateway_id' => 1,
            'country_id' => 1
        ]);

        OrderItems::insert([
            ['order_id' => $order->id,'product_id' => 1, 'qty' => 2],
            ['order_id' => $order->id,'product_id' => 2, 'qty' => 3],
            ['order_id' => $order->id,'product_id' => 3, 'qty' => 1],
        ]);
    }
}
