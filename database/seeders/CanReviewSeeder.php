<?php

namespace Database\Seeders;

use App\Models\CanReview;
use Illuminate\Database\Seeder;

class CanReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++)
            for($j=1; $j<=5; $j++)
                CanReview::create([
                    'user_id' => $i,
                    'product_id' => $j
                ]);
    }
}
