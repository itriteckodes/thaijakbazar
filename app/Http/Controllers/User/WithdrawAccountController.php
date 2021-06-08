<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WithdrawAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.withdraw.withdraw_accounts');
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
        // dd($request);
        WithdrawAccount::create([
            'user_id' => Auth::user()->id
        ]+$request->all());
        toastr()->info('Withdraw Account will be create after Approval');
        return redirect()->back();
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
}
