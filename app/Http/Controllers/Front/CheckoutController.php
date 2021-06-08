<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson)
            return view('api.checkout.index'); 
        else
            return view('front.checkout.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkout = checkout::create([
            'user_id' => Auth::user()?Auth::user()->id:null,
            'vendor_id' => Cart::vendor()->id,
            'code' => Str::random(60),
            'subtotal'=>cartSubtotal(),
            'shipping'=>cartShipping(),
            'tax'=>cartTax(),
            'discount'=>cartDiscount(),
            'grand_total'=>cartGrandTotal(),
        ]+$request->all());

        foreach(Cart::products() as $product){
            CheckoutItem::create([
               
                'product_id' => $product->id,
                'checkout_id' => $checkout->id,
                'qty' => $product['qty']
            ]);

        }
        Cart::clear();

        if($request->expectsJson)
            return redirect('api/checkout/'.$checkout->code.'?api_token='.Auth::user()->api_token.'&expectsJson=true');
        else
            return redirect()->route('front.checkout.show',$checkout->code);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $checkout)
    {
        
        $checkout = Checkout::where('code',$checkout)->first();

        
        if($request->expectsJson)
          return view('api.payment.index')->with('checkout',$checkout);
        else
            return view('front.payment.index')->with('checkout',$checkout);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
