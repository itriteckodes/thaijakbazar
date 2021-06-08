<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = WithdrawRequest::where('status',0)->get();
        return view('admin.withdraw.pending')->with('requests',$requests);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawRequest  $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawRequest $withdrawRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawRequest  $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawRequest $withdrawRequest)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawRequest  $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawRequest $withdrawRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawRequest  $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawRequest $withdrawRequest)
    {
        //
    }

    public function accept(Request $request){
        $withdraw = WithdrawRequest::find($request->withdraw_id);
        $withdraw->update(['status' => 1]);

        TransactionHelper::withdraw($withdraw->withdrawAccount->owner->account, $withdraw->withdrawAccount->title, $withdraw->amount);

        toastr()->success('Withdraw Request Accepted');
        return redirect()->back();
    }

    public function reject(Request $request){
       
        $withdraw = WithdrawRequest::find($request->withdraw_id);
        $withdraw->update(['status' => 2]);

        toastr()->success('Withdraw Request Rejected');
        return redirect()->back();
    }

    public function acceptedRequests()
    {
        $requests = WithdrawRequest::where('status',1)->get();
        return view('admin.withdraw.accepted')->with('requests',$requests);
    } 
    
    public function rejectedRequests()
    {
        $requests = WithdrawRequest::where('status',2)->get();
        return view('admin.withdraw.rejected')->with('requests',$requests);
    }
}
