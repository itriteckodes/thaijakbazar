<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index(Request $request){
        if($request->expectsJson)
            return view('api.cart.index');
        else
            return view('front.cart.index');
    }

    public function add(Request $request)
    {
        $response = Cart::add($request->product_id, $request->qty);
        if($request->expectsJson)
            return $response->json();
        return redirect()->back();  
    }

    public function remove(Request $request)
    {
        Cart::remove($request->product_id);
        return redirect()->back();
    }

    public function decrease(Request $request)
    {
        Cart::decrease($request->product_id);
        return redirect()->back();
    }

    public function increase(Request $request)
    {
        Cart::increase($request->product_id);
        return redirect()->back();
    }
    
    public function applyCoupon(Request $request)
    {
        $response = Cart::applyCoupon($request->code);
        if(!$response->getKey('couponSuccess'))
            toastr()->error('Can not apply this coupon', 'Error');
        else
            toastr()->success('Coupon successfully applid', 'Success');
        
        return redirect()->back();
    }
    
    public function clear(Request $request)
    {
        Session::forget('cart');
        if(Auth::check()){
            $cart = Auth::user()->cart;
            if($cart)
                $cart->delete();
        }
           
        return 'done';
    }
}
