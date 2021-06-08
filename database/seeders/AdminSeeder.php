<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 1234
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '123456',
            'country_id'=> 1,
        ]);

        Account::create([
            'user_id' => 1,
            'type' =>'admin',
            'balance' =>'500',
        ]);
    }
}
