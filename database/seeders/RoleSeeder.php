<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'Dashboared'],
            ['name' => 'General Setting'],
            ['name' => 'Profile'],
            ['name' => 'Account Approval'],
            ['name' => 'Products'],
            ['name' => 'Category'],
            ['name' => 'Subcategory'],
            ['name' => 'User Management'],
            ['name' => 'Vendor Management'],
            ['name' => 'Gateways'],
            ['name' => 'Deposit Methods'],
            ['name' => 'Withdraw Methods'],
            ['name' => 'Contact Messages'],
            ['name' => 'Admins'],
            ['name' => 'Coupons'],
            ['name' => 'Policies'],
            ['name' => 'Blog'],
            ['name' => 'Orders'],
            ['name' => 'Transaction'],
            ['name' => 'Withdraw Account Requests'],
            ['name' => 'Withdraw Request'],
            ['name' => 'Slider'],
            ['name' => 'Banners'],
            ['name' => 'Subscribers'],
            ['name' => 'Tickets'],
            ['name' => 'News Ticker'],
            ['name' => 'Tax'],
            ['name' => 'Account Dashboard'],
        ]);
    }
}
