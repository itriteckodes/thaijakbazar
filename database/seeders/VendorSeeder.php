<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' => 'Zubair',
            'shop_name' => 'Out Fitter',
            'email' => 'vendor1@mail.com',
            'password' => '1234',
            'phone' => '03000630085',
            'email_verify' => 1,
            'balance' =>500,
            'image' =>'images/user.jpg',
            'address' => 'vendor address is here',
            'country_id' =>1
        ]);
        
        Vendor::create([
            'name' => 'Ahmed',
            'shop_name' => 'Ahmed Traders',
            'email' => 'vendor2@mail.com',
            'password' => '1234',
            'phone' => '03000630085',
            'email_verify' => 1,
            'balance' =>500,
            'image' =>'images/user.jpg',
            'address' => 'vendor address is here',
            'country_id' =>1
        ]);
        Vendor::create([
            'name' => 'Usman',
            'shop_name' => 'Usman Electronics',
            'email' => 'vendor3@mail.com',
            'password' => '1234',
            'phone' => '03000630085',
            'email_verify' => 1,
            'balance' =>500,
            'image' =>'images/user.jpg',
            'address' => 'vendor address is here',
            'country_id' =>1
        ]);

        Vendor::create([
            'name' => 'thaivendor',
            'shop_name' => 'Out Fitter',
            'email' => 'thaivendor1@mail.com',
            'password' => '1234',
            'phone' => '03000630085',
            'email_verify' => 1,
            'balance' =>500,
            'image' =>'images/user.jpg',
            'address' => 'vendor address is here',
            'country_id' =>2
        ]);
        for($i=5;$i<=10;$i++){
            Vendor::create([
                'name' => 'vendor'.$i,
                'shop_name' => 'shop'.$i,
                'email' => 'vendor'.$i.'@mail.com',
                'password' => '1234',
                'phone' => '03000630085',
                'email_verify' => 1,
                'balance' =>500,
                'image' =>'images/user.jpg',
                'address' => 'vendor address is here',
                'country_id' =>1
            ]);
        }

        for($i=1;$i<=10;$i++){
            Account::create([
                'vendor_id' => $i,
                'type' =>'vendor',
                'balance' =>'500',
            ]);
        }
    }
}

