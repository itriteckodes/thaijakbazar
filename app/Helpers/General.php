<?php 

use App\Helpers\Cart;
use App\Helpers\Gateway;

function cartVendorId(){
    if(Cart::vendor())
        return Cart::vendor()->id;
    else
        return 'null';
}

function cartQty(){
    return Cart::qty();
}

function cartSubtotal(){
    return Cart::subTotal();
}

function cartTax(){
    return Cart::tax();
}

function cartShipping(){
    return Cart::shipping();
}

function cartDiscount(){
    return Cart::discount();
}

function cartGrandTotal(){
    return Cart::grandTotal();
}

function gateway(){
    return new Gateway();
}
