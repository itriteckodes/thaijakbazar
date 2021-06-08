<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlashSaleResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $new = Product::all()->take(8);
        $topSale = Product::all()->take(5);
        $topRated = Product::all()->take(5);
        $special = Product::all()->take(5);
        $flashSale = FlashSaleResource::collection(FlashSale::Flashproducts());
        $categories = Category::with('subcategories')->get();
        $qty = Cart::qty();
        $banners = Banner::with('product')->get();
        
        $response = new Api();
        $response->add('qty', $qty);
        $response->add('banners', $banners);
        $response->add('new', $new);
        $response->add('flashSale', $flashSale);
        $response->add('topSale', $topSale);
        $response->add('topRated', $topRated);
        $response->add('special', $special);
        $response->add('categories', $categories);

        return $response->json();
    }
}
