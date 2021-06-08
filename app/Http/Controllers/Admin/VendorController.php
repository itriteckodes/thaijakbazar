<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::where('deleted',  false)->where('country_id',Session::get('country_id'))->OrderBy('id','desc')->get();
        return view('admin.vendors.index')->with('vendors', $vendors);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('admin.vendors.view')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor) //using for Blocking/Unblocking vendor
    {
        if ($vendor->status == false) {
            $vendor->update([
                'status' => true
            ]);
            toastr()->info('User Blocked');
            return redirect()->back();
        } else {
            $vendor->update([
                'status' => false
            ]);
            toastr()->success('User Unblock');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        toastr()->success('Vendor Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $products = $vendor->products;
        foreach($products as $product){
            $product->update(['deleted' => true]);
        }
        $vendor->update(['deleted' => true,
        'status'=> true,
        'email_verify'=>false]);
        
        toastr()->error('Vendor Deleted Successfully');
        return redirect()->back();
    }

    public function AddBalance(Request $request)
    {
        $account = Account::where('vendor_id',$request->vendor_id)->first();

        if($account){
            TransactionHelper::VendorBalanceAdd($request,$account);
            $account->update([
                'balance' => $account->balance + $request->balance
            ]);
            toastr()->success('Vendor Balance Added');
            return redirect()->back();
        }else{
            return redirect()->back();
        }

        
    }
    public function SubtractBalance(Request $request)
    {
        $account = Account::where('vendor_id', $request->vendor_id)->first();

        if($account){
            if($account->balance< $request->balance){
                toastr()->error('Vendor has low Balance');
                return redirect()->back();
            }
            TransactionHelper::VendorBalanceSub($request,$account);
            $account->update([
                'balance' => $account->balance - $request->balance
            ]);
            toastr()->success('Vendor Balance Subtracted');
            return redirect()->back();
        }else{
            toastr()->error('Vendor has low Balance');
            return redirect()->back();
        }

       
    }
    public function Tickets(Vendor $vendor){
        // dd($vendor->tickets);
        $tickets = $vendor->tickets;
        return view('admin.vendors.tickets')->with('vendor',$vendor)->with('tickets',$vendor->tickets);

    }
    public function VendorProducts(Vendor $vendor){
        //  dd($vendor->products);
        $products = $vendor->products;
        return view('admin.product.index')->with('vendor',$vendor)->with('products',$products);

    }
}
