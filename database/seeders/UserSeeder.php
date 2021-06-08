<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Haseeb Ullah Khan',
            'email'=> 'user1@mail.com',
            'password' => '1234',
            'phone' => '030332222221',
            'api_token' => 's2Nd55QWSnb4mNXA7So6wdCBBMB82PlFVflHuRDXEKtsCXEo3YLdC6B00UsB',
            'balance' => 500,
            'address' => 'abc,xyz,Pakistan',
            'gender' =>'male',
            'city' => 'Lahore',
            'dob' => '2000-02-28',
            'image' =>'images/user.jpg',
            'country_id' =>1,
        ]);
        
        User::create([
            'name' => 'Muneeb Ullah',
            'email'=> 'user2@mail.com',
            'password' => '1234',
            'phone' => '030332222221',
            'api_token' => 's2Nd55QWSnb4mNXA7So6wdCBBMB82PlFVflHuRDXEKtsCXEo3YLdC6B00UsB',
            'balance' => 500,
            'address' => 'abc,xyz,Pakistan',
            'gender' =>'male',
            'city' => 'Lahore',
            'dob' => '2000-02-28',
            'image' =>'images/user.jpg',
            'country_id' =>1,
        ]);
        
        User::create([
            'name' => 'Safdar',
            'email'=> 'user3@mail.com',
            'password' => '1234',
            'phone' => '030332222221',
            'api_token' => 's2Nd55QWSnb4mNXA7So6wdCBBMB82PlFVflHuRDXEKtsCXEo3YLdC6B00UsB',
            'balance' => 500,
            'address' => 'abc,xyz,Pakistan',
            'gender' =>'male',
            'city' => 'Lahore',
            'dob' => '2000-02-28',
            'image' =>'images/user.jpg',
            'country_id' =>1,
        ]);

        for($i=4;$i<=10;$i++){
            User::create([
                'name' => 'user'.$i,
                'email'=> 'user'.$i.'@mail.com',
                'password' => '1234',
                'phone' => '03033222222'.$i,
                'api_token' => Str::random(60),
                'balance' => 500,
                'address' => 'abc,xyz,Pakistan',
                'gender' =>'male',
                'city' => 'city'.$i,
                'dob' => '2000-02-28',
                'image' =>'images/user.jpg',
                'country_id' =>1,
            ]);
        }

        for($i=2;$i<=11;$i++){
            Account::create([
                'user_id' => $i,
                'type' =>'user',
                'balance' =>'500',
            ]);
        }
    }
}


