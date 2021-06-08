<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <= 20; $i++) {
        //     Product::create([
        //         'name' => 'product' . $i,
        //         'vendor_id' => 1,
        //         'cat_id' => rand(1, 10),
        //         'subcat_id' => rand(1, 10),
        //         'handle' => 'product' . $i,
        //         'price' => 455 * $i,
        //         'old_price' => 645 * $i,
        //         'description' => 'this is the description of the product',
        //         'stock' => 12 * $i,
        //         'rating' => rand(2, 5),

        //     ]);
        // }

        Product::insert([
            [
                'name' => 'Audio aux cables 3.5mm',
                'vendor_id' => '1',
                'cat_id' => 1,
                'subcat_id' => 2,
                'handle' => 'Audio_aux_cables_3.5mm',
                'price' => rand(100, 200),
                'old_price' => rand(300, 400),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/1.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Video Calling Online',
                'vendor_id' => '1',
                'cat_id' => 1,
                'subcat_id' => 8,
                'handle' => 'Video_Calling_Online',
                'price' => rand(3000, 4000),
                'old_price' => rand(6000, 8000),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/2.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Waterproof smart home security camera',
                'vendor_id' => '1',
                'cat_id' => 1,
                'subcat_id' => 9,
                'handle' => 'Waterproof_smart_home_security_camera',
                'price' => rand(8000, 9000),
                'old_price' => rand(12000, 14000),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/3.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Mobile Finger Ring Rotate',
                'vendor_id' => '1',
                'cat_id' => 2,
                'subcat_id' => 1,
                'handle' => 'Mobile_Finger_Ring_Rotate',
                'price' => rand(80, 100),
                'old_price' => rand(130, 150),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/4.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'i12 pro Max Smart Phone',
                'vendor_id' => '1',
                'cat_id' => 2,
                'subcat_id' => 3,
                'handle' => 'i12_pro_Max_Smart_Phone',
                'price' => rand(38000, 40000),
                'old_price' => rand(43000, 45000),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/5.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Tablet 10.1 inch 10 Core',
                'vendor_id' => '1',
                'cat_id' => 2,
                'subcat_id' => 4,
                'handle' => 'Tablet_10.1_inch_10_Core',
                'price' => rand(25000, 30000),
                'old_price' => rand(32000, 35000),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/6.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => '2020 Laptops Customized 14 inch',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 5,
                'handle' => '2020_Laptops_Customized_14_inch',
                'price' => rand(50000, 55000),
                'old_price' => rand(60000, 65000),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/7.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => '21.5 Inch K4 Model Desktop',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 6,
                'handle' => '21.5_Inch_K4_Model_Desktop',
                'price' => rand(9999, 10999),
                'old_price' => rand(12999, 13999),
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/8.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'X9S 5.1 Handheld Gaming Consoles',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 7,
                'handle' => 'X9S_5.1_Handheld_Gaming_Consoles',
                'price' => 550,
                'old_price' => 750,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/9.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'DOBE Factory Direct Supply',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 11,
                'handle' => 'DOBE_Factory_Direct_Supply',
                'price' => 499,
                'old_price' => 699,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/10.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'MEETION MK80',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 12,
                'handle' => 'MEETION_MK80',
                'price' => 5999,
                'old_price' => 6999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/11.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Laptop/desktop 512GB SSD',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 13,
                'handle' => 'Laptop/desktop 512GB SSD',
                'price' => 2000,
                'old_price' => 3000,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/12.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Digital XP600',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 14,
                'handle' => 'Digital_XP600',
                'price' => 22999,
                'old_price' => 25999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/13.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Ram scrap computer ddr4',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 15,
                'handle' => 'Ram scrap computer ddr4',
                'price' => 14999,
                'old_price' => 15999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/14.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Universal Ic',
                'vendor_id' => '1',
                'cat_id' => 3,
                'subcat_id' => 16,
                'handle' => 'Universal_Ic',
                'price' => 399,
                'old_price' => 499,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/15.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Freestanding Bathroom Stone',
                'vendor_id' => '1',
                'cat_id' => 4,
                'subcat_id' => 37,
                'handle' => 'Freestanding_Bathroom_Stone',
                'price' => 30999,
                'old_price' => 42499,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/16.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Bedding duvet covers',
                'vendor_id' => '1',
                'cat_id' => 4,
                'subcat_id' => 38,
                'handle' => 'Bedding_duvet_covers',
                'price' => 999,
                'old_price' => 1199,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/17.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Photo Frame With Wall Sticker',
                'vendor_id' => '1',
                'cat_id' => 4,
                'subcat_id' => 39,
                'handle' => 'Photo_Frame_With_Wall_Sticker',
                'price' => 15999,
                'old_price' => 16999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/18.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Stylish Ceramics Tile Counter',
                'vendor_id' => '1',
                'cat_id' => 4,
                'subcat_id' => 40,
                'handle' => 'Stylish_Ceramics_Tile_Counter',
                'price' => 88999,
                'old_price' => 89999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/19.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Comfortable men leather shoes',
                'vendor_id' => '1',
                'cat_id' => 5,
                'subcat_id' => 41,
                'handle' => 'Comfortable_men_leather_shoes',
                'price' => 1699,
                'old_price' => 1799,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/20.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Bath gift set',
                'vendor_id' => '1',
                'cat_id' => 6,
                'subcat_id' => 17,
                'handle' => 'Bath_gift_set ',
                'price' => 1199,
                'old_price' => 1299,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/21.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Handheld ultrasonic skin galvanic',
                'vendor_id' => '1',
                'cat_id' => 6,
                'subcat_id' => 18,
                'handle' => 'Handheld_ultrasonic_skin_galvanic',
                'price' => 2199,
                'old_price' => 2299,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/22.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
            
            [
                'name' => 'Fine fragrance perfume',
                'vendor_id' => '1',
                'cat_id' => 6,
                'subcat_id' => 19,
                'handle' => 'Fine_fragrance_perfume',
                'price' => 1799,
                'old_price' => 1999,
                'description' => 'Want a superweapon to ignite your customer’s interest in a product? It’s right under your nose: Take your product’s unique features and turn them into benefits.
                 What are features and benefits? Think about what gets you excited about your product that makes it different from your competitors’ products. It might be careful construction, ethically sourced materials, or all the bells and whistles you dreamed up over drinks one night. Those are features.
                 Now, think about what those things do for your customer. Does careful construction mean that your product is safe for children? Do ethically sourced materials make the buyer feel good about purchasing your product? Do those bells and whistles make everyone who sees your customer with your product weep with envy? Those are benefits.
                 In product descriptions, it’s easy to fall into the trap of only describing the features of your products. But when you just list the features, you’re not actually helping your buyer understand how your product will help them.',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/23.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>1,
            ],
//////////////////////////////
            [
                'name' => 'สายสัญญาณเสียง 3.5 มม',
                'vendor_id' => '4',
                'cat_id' => 1,
                'subcat_id' => 2,
                'handle' => 'สายสัญญาณเสียง_3.5_มม',
                'price' => rand(100, 200),
                'old_price' => rand(300, 400),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์คุณสามารถตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณเท่านั้น แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/1.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],


            [
                'name' => 'วิดีโอคอลออนไลน์',
                'vendor_id' => '4',
                'cat_id' => 1,
                'subcat_id' => 8,
                'handle' => 'วิดีโอคอล _ ออนไลน์',
                'price' => rand(3000, 4000),
                'old_price' => rand(6000, 8000),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/2.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'กล้องรักษาความปลอดภัยบ้านอัจฉริยะกันน้ำ',
                'vendor_id' => '4',
                'cat_id' => 1,
                'subcat_id' => 9,
                'handle' => 'กล้องรักษาความปลอดภัยภายในบ้านอัจฉริยะกันน้ำ',
                'price' => rand(8000, 9000),
                'old_price' => rand(12000, 14000),
                'description' => 'ต้องการอาวุธที่ยอดเยี่ยมเพื่อจุดประกายความสนใจของลูกค้าที่มีต่อผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/3.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'แหวนนิ้วมือถือหมุน',
                'vendor_id' => '4',
                'cat_id' => 2,
                'subcat_id' => 1,
                'handle' => 'มือถือ_นิ้ว_แหวน_หมุน',
                'price' => rand(80, 100),
                'old_price' => rand(130, 150),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์คุณสามารถตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณเท่านั้น แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/4.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'i12 สมาร์ทโฟน',
                'vendor_id' => '4',
                'cat_id' => 2,
                'subcat_id' => 3,
                'handle' => 'i12_สมาร์ทโฟน',
                'price' => rand(38000, 40000),
                'old_price' => rand(43000, 45000),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์คุณสามารถตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณเท่านั้น แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/5.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],


            [
                'name' => 'แท็บเล็ต 10.1 นิ้ว 10 แกน',
                'vendor_id' => '4',
                'cat_id' => 2,
                'subcat_id' => 4,
                'handle' => 'แท็บเล็ต_10.1_นิ้ว_10_แกน',
                'price' => rand(25000, 30000),
                'old_price' => rand(32000, 35000),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/6.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'แล็ปท็อปปี 2020 กำหนดเอง 14 นิ้ว',
                'vendor_id' => '4',
                'cat_id' => 3,
                'subcat_id' => 5,
                'handle' => 'แล็ปท็อปปี_2020_กำหนดเอง_14_นิ้ว',
                'price' => rand(50000, 55000),
                'old_price' => rand(60000, 65000),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/7.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'เดสก์ท็อปรุ่น K4 ขนาด 21.5 นิ้ว',
                'vendor_id' => '4',
                'cat_id' => 3,
                'subcat_id' => 6,
                'handle' => 'เดสก์ท็อปรุ่น_K4_ขนาด_21.5_นิ้ว',
                'price' => rand(9999, 10999),
                'old_price' => rand(12999, 13999),
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือ
                
                
                เสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/8.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'X9S 5.1 คอนโซลเกมมือถือ',
                'vendor_id' => '4',
                'cat_id' => 3,
                'subcat_id' => 7,
                'handle' => 'X9S_5.1_คอนโซลเกมมือถือ',
                'price' => 550,
                'old_price' => 750,
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/9.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],

            [
                'name' => 'การประชุม MK80',
                'vendor_id' => '4',
                'cat_id' => 3,
                'subcat_id' => 12,
                'handle' => 'การประชุม_MK80',
                'price' => 5999,
                'old_price' => 6999,
                'description' => 'ต้องการ อาวุธพิเศษ เพื่อกระตุ้นความสนใจของลูกค้าในผลิตภัณฑ์หรือไม่? อยู่ใต้จมูกของคุณ: ใช้คุณลักษณะเฉพาะของผลิตภัณฑ์ของคุณและเปลี่ยนให้เป็นประโยชน์
                คุณสมบัติและประโยชน์คืออะไร? ลองนึกถึงสิ่งที่ทำให้คุณรู้สึกตื่นเต้นเกี่ยวกับผลิตภัณฑ์ของคุณซึ่งทำให้ผลิตภัณฑ์แตกต่างจากผลิตภัณฑ์ของคู่แข่ง อาจเป็นการก่อสร้างอย่างระมัดระวังวัสดุที่มาจากจริยธรรมหรือเสียงระฆังและนกหวีดทั้งหมดที่คุณฝันถึงเมื่อดื่มในคืนหนึ่ง นั่นคือคุณสมบัติ
                ตอนนี้ลองคิดดูว่าสิ่งเหล่านั้นทำอะไรให้กับลูกค้าของคุณ การก่อสร้างอย่างระมัดระวังหมายความว่าผลิตภัณฑ์ของคุณปลอดภัยสำหรับเด็กหรือไม่? วัสดุที่มาอย่างมีจริยธรรมทำให้ผู้ซื้อรู้สึกดีกับการซื้อผลิตภัณฑ์ของคุณหรือไม่? เสียงระฆังและเสียงนกหวีดเหล่านั้นทำให้ทุกคนที่เห็นลูกค้าของคุณร้องไห้ด้วยความอิจฉาหรือไม่? สิ่งเหล่านั้นคือผลประโยชน์
                ในคำอธิบายผลิตภัณฑ์เป็นเรื่องง่ายที่จะตกหลุมพรางเพียงการอธิบายคุณลักษณะของผลิตภัณฑ์ของคุณ แต่เมื่อคุณเพียงแค่แสดงรายการคุณลักษณะคุณไม่ได้ช่วยให้ผู้ซื้อเข้าใจว่าผลิตภัณฑ์ของคุณจะช่วยพวกเขาได้อย่างไร',
                'stock' => 10,
                'rating' => rand(2, 5),
                'thumbnail'=> 'images/product/thumbnail/11.jpg',
                'shipping' => 100,
                'product_no' => rand(10,100),
                'country_id' =>2,
            ],
        ]);
    }
}
