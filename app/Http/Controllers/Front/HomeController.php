<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('country_id',Session::get('country_id'))->get();
        $topproducts = Product::TopRated();
        $sideflashsale = FlashSale::Flashproducts();
        $flashsale = FlashSale::Flashproducts();
        $newproducts = Product::New();
        $topsales = Product::TopSeller();



        return view('front.home.index')->with('categories',$categories)->with('topproducts',$topproducts)->with('sideflashsale',$sideflashsale)->with('flashsale',$flashsale)->with('newproducts',$newproducts)->with('topsales',$topsales);
    }
}
