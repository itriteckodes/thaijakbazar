<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request){
        $products = Product::where('country_id',Session::get('country_id'))->where('name', 'LIKE', "%$request->search%")->orderBy('name')->simplepaginate(6);
        return view('front.shop.index')->with('products',$products);
    }

    
    public function FilterSearch(Request $request){

        $price = str_replace(Session::get('currency_name').' ','',$request->price);
        $price = str_replace('-','',$price);
        $data = explode(' ',$price);

        if($request->rating == 'all'){
            $products = Product::where('country_id',Session::get('country_id'))->whereBetween('price',[$data[0],$data[2]])->simplepaginate(6)->withQueryString();
            return view('front.shop.index')->with('products',$products);
            
        }
        else{
            $products = Product::where('country_id',Session::get('country_id'))->whereBetween('price',[$data[0],$data[2]])->where('rating',$request->rating)->simplepaginate(6)->withQueryString();
            return view('front.shop.index')->with('products',$products);
        }
       

    }
}
