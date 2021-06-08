<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\OrderStatus;
use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index($id)
    {
        $orders = Order::where('vendor_id', $id)->get();
        return view('admin.vendors.detail')->with('orders', $orders);
    }
    public function UserOrder($id)
    {
        $orders = Order::where('user_id', $id)->get();
        return view('admin.vendors.detail')->with('orders', $orders);
    }
    public function pending()
    {
        $orders = Order::where('status', OrderStatus::pending())->where('country_id',Session::get('country_id'))->OrderBy('id', 'desc')->get();
        return view('admin.order.pending')->with('orders', $orders);
    }

    public function accepted()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::accepted())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.accepted')->with('orders', $orders);
    }

    public function rejected()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::rejected())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.rejected')->with('orders', $orders);
    }

    public function dispatched()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::dispatched())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.dispatched')->with('orders', $orders);
    }

    public function delivered()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::delivered())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.delivered')->with('orders', $orders);
    }
    public function ready()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', OrderStatus::readyToShip())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.ready')->with('orders', $orders);
    }
    public function history()
    {
        $orders = Order::where('vendor_id', Auth::user()->id)->where('status', '!=', OrderStatus::pending())->where('country_id',Session::get('country_id'))->get();
        return view('admin.order.history')->with('orders', $orders);
    }
    public function details($id)
    {
        $order = Order::find($id);
        $order_items = $order->items;
        $total_qty = 0;
        foreach ($order_items as $item) {
            $total_qty += $item->qty;
        }
        return view('admin.order.detail')->with('order', $order)->with('total_qty', $total_qty);
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

    public function readyToShip($id)
    {
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::readyToShip()
        ]);
        toastr()->info('order status was marked as Ready To Ship', 'Done');
        return redirect()->back();
    }

    public function reject($id)
    {
        $order =  Order::find($id);
        $order->update([
            'status' =>  OrderStatus::rejected()
        ]);
        toastr()->info('order status was marked as rejected', 'Done');
        return redirect()->back();
    }

    public function comments(Request $request, $id)
    {
        $order =  Order::find($id);
        $order->update([
            'comment' =>  $request->comment
        ]);
        toastr()->info('Comment Added Successfully', 'Done');
        return redirect()->back();
    }
}
