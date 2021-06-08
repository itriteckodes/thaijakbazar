<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountApproval;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvals = AccountApproval::where('country_id',Session::get('country_id'))->get();
        return view('admin.account_approval.index')->with('approvals',$approvals);
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
     * @param  \App\Models\AccountApproval  $accountApproval
     * @return \Illuminate\Http\Response
     */
    public function show(AccountApproval $accountApproval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountApproval  $accountApproval
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountApproval $accountApproval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountApproval  $accountApproval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountApproval $accountApproval)
    {
        // dd($accountApproval);
        if($accountApproval->type == 'user'){
            $user = User::find($accountApproval->user_id);
            $user->update([
                'approve' => 1,
                'rejected' => true
            ]);
            $accountApproval->delete();
            toastr()->info('Account Approved');
            return redirect()->back();
        }else{
            $vendor = Vendor::find($accountApproval->vendor_id);
            $vendor->update([
                'approve' => 1,
            ]);
            $accountApproval->delete();
            toastr()->info('Account Approved');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountApproval  $accountApproval
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountApproval $accountApproval)
    {
        // dd($accountApproval);
        $accountApproval->update([
            'status' => 'rejected'
        ]);
        if($accountApproval->type == 'user'){
            $user = User::find($accountApproval->user_id);
            $user->update([
                'approve' => 2,
            ]);
           
        }else{
            $vendor = Vendor::find($accountApproval->vendor_id);
            $vendor->update([
                'approve' => 2
            ]);
            
        }
        toastr()->warning('Account Rejected');
        return redirect()->back();
    }
}
