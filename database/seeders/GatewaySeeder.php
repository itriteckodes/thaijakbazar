<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gateway::insert([
            ['country_id' => 1,'name' => 'COD', 'image' => 'images/gateway/cod.png','api_key'=>'','publishable_key'=>'cod_has_no_key','secret_key'=>'cod_has_no_key','handle'=>'cod','status'=>false],
            
            ['country_id' => 1,'name' => 'Wallet', 'image' => 'images/gateway/wallet.png','api_key'=>'','publishable_key'=>'wallet_has_no_key','secret_key'=>'wallet_has_no_key','handle'=>'walletpayment','status'=>false],
            
            ['country_id' => 1,'name' => 'Card Payment', 'image' => 'images/gateway/stripe.png','api_key'=>'','publishable_key'=>'pk_test_51GxWFUBWndAApmnXy1V3eBe1Up1u3DpEe18J1YQTXzH3lX6aGqp2x37wbW9490pxcOEonsT68gn9fAIgk7z13A7Z00JdJA6Dqj','secret_key'=>'sk_test_51GxWFUBWndAApmnXy7J7vJJsal8JDPTzELLVngyJJdZrhsDhPuAj0GA1jkcagcP4INiS33IuTNbD2n2Q324c78Qy00Cr7xKFzL','handle'=>'cardpayment','status'=>false],

            ['country_id' => 1,'name' => 'PayPal', 'image' => 'images/gateway/paypal.jpg','api_key'=>'sb-dyxbn1483969_api1.business.example.com','publishable_key'=>'QZRP2RD82HEWKGGG','secret_key'=>'AREk5eRRQyB.Gz0vTvIVchZkkKiAArWRvBJTxLC8Qgj6IbzwKP2DkeJc','handle'=>'paypal','status'=>true],

            ['country_id' => 1,'name' => 'Jazz Cash', 'image' => 'images/gateway/jazzcash.jpg','api_key'=>'','publishable_key'=>'','secret_key'=>'','handle'=>'jazzcash','status'=>false],

            ['country_id' => 1,'name' => 'Easy Paisa', 'image' => 'images/gateway/easypaisa.jpg','api_key'=>'','publishable_key'=>'','secret_key'=>'','handle'=>'easypaisa','status'=>false],

            ['country_id' => 1,'name' => 'Eric Coin', 'image' => 'images/gateway/er.jpg','api_key'=>'','publishable_key'=>'','secret_key'=>'','handle'=>'ericcoin','status'=>false],

            ['country_id' => 1,'name' => 'Jak Coin', 'image' => 'images/gateway/jak.jpg','api_key'=>'','publishable_key'=>'','secret_key'=>'','handle'=>'jakcoin','status'=>false],
            
        ]);
    }
}
