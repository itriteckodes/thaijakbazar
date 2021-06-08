<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Auth::user()->orders;
        foreach ($orders as $order) {
            foreach ($order->items as $key2 => $item) {
                $order->items[$key2] = $item->product;
                $order->items[$key2]->qty = $item->qty;
            }
        }
        return Api::setResponse('orders', $orders);
    }
}
