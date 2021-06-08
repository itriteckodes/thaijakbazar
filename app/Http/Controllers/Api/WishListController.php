<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishListResource;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function add(Request $request){
        WishList::updateOrCreate([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
        ]);

        $product = Product::find($request->product_id);
        return Api::setResponse('product', $product);
    }

    public function index(){
        $products = WishListResource::collection(Auth::user()->wishLists);
        return Api::setResponse('products', $products);
    }

    public function remove(Request $request){
        $wish = WishList::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();
        if($wish)
        $wish->delete();
        return Api::setMessage('Product remove from Wish list');
    }
}
