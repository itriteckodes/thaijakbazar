<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request){
        $product = Product::find($request->product_id);
        $product->reviews;
        $product->vendor;

        $response = new Api();
        $response->add('product', $product);
        $response->add('related_products', $product->related());
        return $response->json();
    }
    
    public function search(Request $request){
        
        $products = Product::where('name', 'LIKE', "%".$request->keyword."%");

        if($request->min != -1){
            $products = $products->where('price','>=', $request->min);
        }
        if($request->max != -1){
            $products = $products->where('price','<', $request->max);
        }
        if($request->rating != 0){
            $products = $products->where('rating','>=',$request->rating);
        }
        if($request->category_id != -1){
            $products = $products->where('cat_id',$request->category_id);
        }
        if($request->subcat_id != -1){
            $products = $products->where('subcat_id',$request->subcat_id);
        }
        $products = $products->paginate(5)->getCollection();

        $response = new Api();
        $response->add('products', $products);
        return $response->json();
    }

    public function VendorProducts(Request $request){
        $vendor = Vendor::find($request->vendor_id);
        $products = $vendor->products;
        return Api::setResponse('products', $products);
    }

    public function CategoryProducts(Request $request){
        $category = Category::find($request->category_id);
        $products = $category->products;
        return Api::setResponse('products', $products);
    }

    public function ProductName(){
        $names = Product::pluck('name');
        return response($names);
    }

    public function GetCartQty(){
        $qty = Cart::qty();
        return Api::setResponse('qty', $qty);
    }
}
