<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\OrderStatus;
use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('country_id',Session::get('country_id'))->OrderBy('id','desc')->get();
        
        return view('admin.users.index')->with('users',$users);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd('user');
        $accepted = Order::where('user_id', $user->id)->where('status', OrderStatus::accepted())->get();
        // rejected orders
        $rejected = Order::where('user_id', $user->id)->where('status', OrderStatus::rejected())->get();
        // dispatched orders
        $dispatched = Order::where('user_id', $user->id)->where('status', OrderStatus::dispatched())->get();
        // pending orders list
        $orders = Order::where('user_id', $user->id)->where('status', OrderStatus::pending())->get();
        // today order
        return view('admin.users.view')->with('user', $user)->with('orders', $orders)->with('accepted', $accepted)->with('rejected', $rejected)->with('dispatched', $dispatched);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) //using for Blocking/Unblocking user
    {
        if($user->status == false){
            $user->update([
                'status' => true
            ]);
            toastr()->info('User Blocked');
            return redirect()->back();
        }else{
            $user->update([
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        toastr()->success('Kindly Wait For Your Account Approval');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        toastr()->error('User Deleted Successfully');
        return redirect()->back();
    }
    public function AddBalance(Request $request)
    {
        $account = Account::where('user_id', $request->user_id)->first();
        TransactionHelper::UserBalanceAdd($request,$account);
        $account->update([
            'balance' => $account->balance + $request->balance
        ]);
       
        toastr()->success('User Balance Added');
        return redirect()->back();
    }
    public function SubtractBalance(Request $request)
    {
        $account = Account::where('user_id', $request->user_id)->first();
        if ($account->balance < $request->balance) {
            toastr()->error('User has low Balance');
            return redirect()->back();
        }else{
            TransactionHelper::UserBalanceSub($request, $account);
            $account->update([
                'balance' => $account->balance - $request->balance
            ]);
           
            toastr()->success('User Balance Subtracted');
            return redirect()->back();
        }
    }

    public function Accounts($id){

        $user = User::find($id);
        $accounts = $user->CanWithdrawAccount;
        return view('admin.users.accounts')->with('users',$user)->with('accounts', $accounts);
    }
}
