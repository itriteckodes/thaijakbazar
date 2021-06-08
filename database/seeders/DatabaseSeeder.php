<?php

namespace Database\Seeders;

use App\Models\CanReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(VendorSeeder::class);
        $this->call(SubCategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(FlashSaleSeeder::class);
        // $this->call(ProductImageSeeder::class);
        // $this->call(CouponSeeder::class);
        $this->call(GatewaySeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(ReviewSeeder::class);
        $this->call(GeneralSeeder::class);
        // $this->call(CanReviewSeeder::class);
        $this->call(PolicySeeder::class);
        $this->call(HowItWorksSeeder::class);
        $this->call(WithdrawMethodSeeder::class);
        $this->call(DepositMethodSeeder::class);
        // $this->call(BannerSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleRouteSeeder::class);
        $this->call(AssingRoleSeeder::class);
        $this->call(ValueSeeder::class);
        $this->call(NewsTickerSeeder::class);
        
    }
}
