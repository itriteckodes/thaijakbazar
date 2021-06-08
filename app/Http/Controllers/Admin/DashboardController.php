<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TransactionHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function AddBalance(Request $request){
        $account = Account::find(1);
        TransactionHelper::CompanyBalanceAdd($request,$account);
        $account->update([
            'balance' =>$account->balance + $request->balance
        ]);
        
        toastr()->success('Balance Added','Done');
        return redirect()->back();
    }
    
    public function SubtractBalance(Request $request){
        $account = Account::find(1);
        TransactionHelper::CompanyBalanceSub($request,$account);
        $account->update([
            'balance' =>$account->balance - $request->balance
        ]);
        
        toastr()->success('Balance Subtracted','Done');
        return redirect()->back();
    }
}
