<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        return view('user.transaction.index')->with('transactions',$transactions)->with('debit_sum',$debit_sum)->with('credit_sum',$credit_sum);
    }
}
