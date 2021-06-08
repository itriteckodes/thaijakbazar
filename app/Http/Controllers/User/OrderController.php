<?php

namespace App\Http\Controllers\User;

use App\Helpers\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders->where('status','!=',OrderStatus::pending());
        return view('user.order.history')->with('orders',$orders);
    }
    public function processing()
    {
        // dd('processing');
        $orders = Auth::user()->orders->where('status','!=',OrderStatus::accepted());
        return view('user.order.processing')->with('orders',$orders);
    }
    public function canceled()
    {
        // dd('processing');
        $orders = Auth::user()->orders->where('status','=',OrderStatus::rejected());
        return view('user.order.canceled')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Auth::user()->orders->where('status',OrderStatus::pending());
        return view('user.order.pending')->with('orders',$orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // dd($order);
       
        $order_items = $order->items;
        $total_qty = 0;
        foreach($order_items as $item){
            $total_qty += $item->qty;
        }
      
        return view('user.order.detail')->with('order',$order)->with('total_qty',$total_qty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    
}
