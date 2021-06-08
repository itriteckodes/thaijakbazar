<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;

class WithdrawMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = WithdrawMethod::all();
        return view('admin.withdraw.method')->with('methods', $methods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WithdrawMethod::create($request->all());
        toastr()->success('Method Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawMethod $withdrawMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawMethod  $withdrawMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawMethod $withdrawmethod)
    {
        $withdrawmethod->delete();
        toastr()->error('Withdraw Method Deleted');
        return redirect()->back();

    }
}
