<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function trackOrder(Request $request){
        // dd($request);
        $order = Order::find($request->order_number);
        // dd($order);
        return view('front.track-order.index')->with('order',$order);
    }
}
