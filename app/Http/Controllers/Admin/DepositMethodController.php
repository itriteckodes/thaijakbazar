<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepositMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gateways = DepositMethod::where('country_id',Session::get('country_id'))->get();
        return view('admin.deposit_methods.index')->with('gateways',$gateways);
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
     * @param  \App\Models\DepositMethod  $depositMethod
     * @return \Illuminate\Http\Response
     */
    public function show(DepositMethod $depositMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositMethod  $depositMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(DepositMethod $depositMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepositMethod  $depositMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepositMethod $depositMethod)
    {
        $depositMethod->update($request->all());
        toastr()->success('Deposit Method Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepositMethod  $depositMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepositMethod $depositMethod)
    {
        //
    }
}
