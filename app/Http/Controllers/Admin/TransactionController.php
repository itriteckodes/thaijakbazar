<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function vendor()
    {
        $vendors = Vendor::where('country_id',Session::get('country_id'))->get();
        $transactions = [];
        foreach ($vendors as $vendor) {
            foreach ($vendor->account->transactions as $transaction) {
                array_push($transactions, $transaction);
            }
        }
        $debit_sum = 0;
        $credit_sum = 0;
        foreach ($transactions as $transaction) {
            $debit_sum += $transaction->debit;
            $credit_sum += $transaction->credit;
        }
        return view('admin.transaction.vendor')->with('transactions', $transactions)->with('debit_sum', $debit_sum)->with('credit_sum', $credit_sum);
    }
    public function user()
    {
        $users = User::where('id', '!=', 1)->where('country_id',Session::get('country_id'))->get();
        $transactions = [];
        foreach ($users as $user) {
            foreach ($user->account->transactions as $transaction) {
                array_push($transactions, $transaction);
            }
        }
        $debit_sum = 0;
        $credit_sum = 0;
        foreach ($transactions as $transaction) {
            $debit_sum += $transaction->debit;
            $credit_sum += $transaction->credit;
        }
        return view('admin.transaction.user')->with('transactions', $transactions)->with('debit_sum', $debit_sum)->with('credit_sum', $credit_sum);
    }

    public function company()
    {
        $transactions = Transaction::where('account_id', 1)->where('country_id',Session::get('country_id'))->get();
        $debit_sum = 0;
        $credit_sum = 0;
        foreach ($transactions as $transaction) {
            $debit_sum += $transaction->debit;
            $credit_sum += $transaction->credit;
        }
        return view('admin.transaction.company')->with('transactions', $transactions)->with('debit_sum', $debit_sum)->with('credit_sum', $credit_sum);
    }
}
