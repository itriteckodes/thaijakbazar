<?php

namespace App\Http\Controllers\User;

use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\DepositMethod;
use App\Models\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.deposit.new');
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

        if ($gateway->isRestricted()) {
            toastr()->warning('Comming Soon', 'Payment method will be available soon');
            return redirect()->back();
        }

        if ($gateway->isCardPayment()) {
            $this->payFromStripe($request);
        }

        TransactionHelper::deposit(Auth::user()->account, $gateway->name, $request->amount);
        toastr()->success('Balance added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function payFromStripe($request)
    {

        $cardpayment = Gateway::where('handle', 'cardpayment')->first();
        Stripe::setApiKey($cardpayment->secret_key);

        Charge::create([
            "amount" => $request->amount * 100,
            "currency" => Session::get('currency_symbol'),
            "source" => $request->stripeToken,
            "description" => "Payment from JakBazar"
        ]);
    }
}
