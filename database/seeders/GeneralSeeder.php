<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'country_id' => 1,
            'logo' => 'front/images/logo13.png',
            'email' => 'jakbazar@support.com',
            'phone' => '123456789',
            'address' => 'abc, xyz, Pakistan',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'twitter' => 'https://twitter.com/',
            'youtube' => 'https://youtube.com/',
            'commision' => '10'
        ]);
        
        GeneralSetting::create([
            'country_id' => 2,
            'logo' => 'front/images/logo13.png',
            'email' => 'jakbazar@support.com',
            'phone' => '123456789',
            'address' => 'abc, xyz, Thailand',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'twitter' => 'https://twitter.com/',
            'youtube' => 'https://youtube.com/',
            'commision' => '10'
        ]);
    }
}
