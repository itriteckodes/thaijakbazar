<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\WithdrawStatus;
use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
   public function index(){
       $transactions= Auth::user()->account->transactions;
       $debit_sum =0;
        $credit_sum = 0;
        foreach($transactions as $transaction){
            $debit_sum += $transaction->debit;
            $credit_sum += $transaction->credit;
        }
       return view('vendor.transaction.index')->with('transactions',$transactions)->with('credit_sum',$credit_sum)->with('debit_sum',$debit_sum);
   }
}
