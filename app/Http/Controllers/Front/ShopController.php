<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('country_id',Session::get('country_id'))->orderBy('id', 'desc')->simplePaginate(9);
        return view('front.shop.index')->with('products',$products);
    }
}
