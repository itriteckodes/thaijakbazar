<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WithdrawAccount;
use Illuminate\Http\Request;

class WithdrawAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawAccounts = WithdrawAccount::all();
        // dd($withdrawAccounts);
        return view('admin.withdraw.withdraw_account_reqs')->with('withdrawaccounts', $withdrawAccounts);
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
     * @param  \App\Models\WithdrawAccount  $withdrawAccount
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawAccount $withdrawAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawAccount  $withdrawAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawAccount $withdrawAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawAccount  $withdrawAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawAccount $withdrawAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawAccount  $withdrawAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawAccount $withdrawAccount)
    {
        //
    }

    public function accept(Request $request){
        $withdrawAccount = WithdrawAccount::find($request->request_id);
        $withdrawAccount->update([
            'status' => 1
        ]);
        toastr()->success('Withdraw Account Request Accepted');
        return redirect()->back();
    } 
    public function reject(Request $request){
        $withdraw = WithdrawAccount::find($request->request_id);
        $withdraw->update([
            'status' => 2
        ]);
        toastr()->info('Withdraw Account Request Error');
        return redirect()->back();
    }
}
