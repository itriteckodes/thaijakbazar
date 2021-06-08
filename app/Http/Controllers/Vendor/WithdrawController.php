<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\WithdrawStatus;
use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function newRequest(){
        $balance = Auth::user()->balance;
        return view('vendor.withdraw.newRequest')->with('balance',$balance);
    }

    public function createRequest(Request $request){

        // dd($request);
        $withdrawRequest = WithdrawRequest::create($request->all());
        
        toastr()->info('your request is under review..wait until it get approved');
        return redirect()->back();
    }

    /// pending requests////

    public function pendingRequests(){
       
        return view('vendor.withdraw.pending');
    }
    

    public function completedRequests(){
       
        return view('vendor.withdraw.completed');
    }

    public function rejectedRequests(){
      
        return view('vendor.withdraw.rejected');
    }

    public function history(){
        $requests = WithdrawRequest::where('vendor_id',Auth::user()->id)->where('status','!=',WithdrawStatus::pending())->get();
        return view('vendor.withdraw.history')->with('requests',$requests);
    }
}
