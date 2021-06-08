<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\OrderStatus;
use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pending()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::pending())->get();
        return view('vendor.order.pending')->with('orders', $orders);
    }

    public function accepted()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::accepted())->get();
        return view('vendor.order.accepted')->with('orders', $orders);
    }
    public function ready(){
        $orders = Order::where('vendor_id',Auth::user()->id)->where('status',OrderStatus::readyToShip())->get();
        return view('vendor.order.ready')->with('orders',$orders);
    }
    public function rejected()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::rejected())->get();
        return view('vendor.order.rejected')->with('orders', $orders);
    }

    public function dispatched()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::dispatched())->get();
        return view('vendor.order.dispatched')->with('orders', $orders);
    }

    public function delivered()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::delivered())->get();
        return view('vendor.order.delivered')->with('orders', $orders);
    }
    public function history()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', '!=', OrderStatus::pending())->get();
        return view('vendor.order.history')->with('orders', $orders);
    }
    public function details($id)
    {
        $order = Order::find($id);
        $order_items = $order->items;
        $total_qty = 0;
        foreach ($order_items as $item) {
            $total_qty += $item->qty;
        }
        return view('vendor.order.detail')->with('order', $order)->with('total_qty', $total_qty);
    }



    // change order status

    public function accept($id)
    {
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::accepted()
        ]);
        toastr()->info('order status was marked as accepted', 'Done');
        return redirect()->back();
    }

    public function deliver($id)
    {
        $order =  Order::find($id);

        if ($order->status == OrderStatus::delivered()) {
            return redirect()->back();
        } else {

            $order->update([
                'status' =>  OrderStatus::delivered()
            ]);
            TransactionHelper::OrderAmount($order);
            TransactionHelper::SubFromAdmin($order);
            TransactionHelper::reciept($order);
            TransactionHelper::CompanyOrderCommission($order);
            TransactionHelper::profit($order);

            toastr()->info('order status was marked as delivered', 'Done');
            return redirect()->back();
        }
    }

    public function dispatch($id)
    {
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::dispatched()
        ]);
        toastr()->info('order status was marked as dispatched', 'Done');
        return redirect()->back();
    }
    public function readyToShip($id){
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::readyToShip() 
        ]);
        toastr()->info('order status was marked as Ready To Ship','Done');
        return redirect()->back();
     }

    public function reject($id)
    {
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::rejected()
        ]);
        TransactionHelper::orderCancel($order);
        toastr()->info('order status was marked as rejected', 'Done');
        return redirect()->back();
    }

    // print //

    public function print($id)
    {
        $order = Order::find($id);
        $order_items = $order->items;
        $total_qty = 0;
        foreach ($order_items as $item) {
            $total_qty += $item->qty;
        }
        return view('vendor.order.print')->with('order', $order)->with('total_qty', $total_qty);
    }
}
