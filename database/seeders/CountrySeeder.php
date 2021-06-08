<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            ['name'=>'Pakistan','currency_name'=>'PKR','currency_symbol'=>'pkr'],
            ['name'=>'Thailand','currency_name'=>'THB','currency_symbol'=>'thb'],
        ]);
    }
}
