<?php

namespace App\Http\Controllers\Front;

use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Gateway;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $gateway = Gateway::find($request->gateway_id);
        $checkout = Checkout::find($request->checkout_id);


        if (!Auth::check() && $gateway->isWallet()) {
            toastr()->error('Please Login First');
            return redirect()->back();
        }


        if(Auth::check()){
            $account = Auth::user()->account;

            if ($gateway->isWallet()) {
                if ($account->balance < $checkout->grand_total) {
                    toastr()->error('You Dont Have Enough Balance');
                    return redirect()->back();
                }
            }
        }

        if ($gateway->isRestricted()) {
            toastr()->warning('Comming Soon', 'Payment method will be available soon');
            return redirect()->back();
        }

        if ($gateway->isCardPayment()) {
            $this->payFromStripe($checkout, $request);
        }

        $order = $this->order($checkout, $request);

        if(Auth::check())
            TransactionHelper::purchase(Auth::user()->account, $gateway, $order);
        
        TransactionHelper::sale($order);

        if ($request->expectsJson) {
            return view('api.thankyou.index')->with('order', $order);
        } else {
            toastr()->success('Order Placed Successfully');
            return view('front.thankyou.index')->with('order', $order);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
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

    public static function order($checkout, $request)
    {
        $order = Order::create([
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'name' => $checkout->name,
            'email' => $checkout->email,
            'phone' => $checkout->phone,
            'address' => $checkout->address,
            'city' => $checkout->city,
            'note' => $checkout->note,
            'subtotal' => $checkout->subtotal,
            'shipping' => $checkout->shipping,
            'tax' => $checkout->tax,
            'discount' => $checkout->discount,
            'grand_total' => $checkout->grand_total,
            'gateway_id' => $request->gateway_id,
            'vendor_id' => $checkout->vendor_id,
            'country_id' => $checkout->country_id,

        ]);

        foreach ($checkout->items as $item) {
            OrderItems::create([

                'product_id' => $item->product->id,
                'order_id' => $order->id,
                'qty' => $item->qty
            ]);
        }

        // $checkout->delete();
        return $order;
    }

    public static function payFromStripe($checkout, $request)
    {

        $cardpayment = Gateway::where('handle', 'cardpayment')->first();
        Stripe::setApiKey($cardpayment->secret_key);

        Charge::create([
            "amount" => $checkout->grand_total * 100,
            "currency" => Session::get('currency_symbol'),
            "source" => $request->stripeToken,
            "description" => "Payment from JakBazar"
        ]);
    }
}
