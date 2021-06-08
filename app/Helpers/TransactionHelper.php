<?php
namespace App\Helpers;

use App\Models\Account;
use App\Models\Transaction;
use App\Values\SetValue;

class TransactionHelper
{
    public static function purchase($account, $gateway, $order){
        $amount = $order->grand_total;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'country_id' => $order->country_id,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was placed.',
        ]);
        
        if(!$gateway->isCOD() && !$gateway->isWallet()){
            self::deposit($account, $gateway->name, $amount);
            self::payment($account, $order, $amount);
        }
        else if($gateway->isWallet())
            self::payment($account, $order, $amount);
    }

    public static function sale($order){
        $amount = $order->grand_total;
        $account = $order->vendor->account;
        $gateway = $order->gateway;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'country_id' => $order->country_id,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was placed.',
        ]);
        
        if(!$gateway->isCOD())
            self::reciept($order);
    }
    
    public static function orderCancel($order){
        $amount = $order->grand_total;
        $account = $order->vendor->account;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'country_id' => $order->country_id,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was Canceled.',
        ]);
        
        if($order->paid){
            if($order->isFromRegisteredUser())
                self::return($account, $order, $amount);
            self::payment($account, $order, $amount);
        }

    }

    public static function withdraw($account, $methodName, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance - $amount,
            'amount' => $amount,
            'nature' => 'Debit',
            'debit' => $amount,
            'credit' => 0,
            'description' => 'PKR '.$amount.' withdrawn from '.$account->owner->name.' through '.$methodName. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance - $amount
        ]);
    }
    
    public static function deposit($account, $methodName, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'description' => 'PKR '.$amount.' deposited to '.$account->owner->name.' through '.$methodName. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }

    public static function reciept($order){

        $amount = $order->subtotal;
        $account = $order->vendor->account;
        $gateway = $order->gateway;
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'country_id' => $order->country_id,
            'description' => 'PKR '.$amount.' was received from an order #'.$order->id.' through '.$gateway->name. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }
    
    public static function payment($account, $order, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance - $amount,
            'amount' => $amount,
            'nature' => 'Debit',
            'debit' => $amount,
            'credit' => 0,
            'description' => 'PKR '.$amount.' was paid against order# '.$order->id.'.',
        ]);
        $account->update([
            'balance' => $account->balance - $amount
        ]);
    }
    
    public static function return($account, $order, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'description' => 'PKR '.$amount.' was returned From '.$order->vendor->name. ' against order#'.$order->id.'.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }

    public static function OrderAmount($order){
        $amount = $order->grand_total;

        $account = Account::where('user_id',1)->first();
        $gateway = $order->gateway;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'country_id' => $order->country_id,
            'description' => 'PKR '.$amount.' was received from an order #'.$order->id.' through '.$gateway->name. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }


    public static function SubFromAdmin($order){
        
        $amount = $order->subtotal;
        $account = Account::where('user_id',1)->first();
        $gateway = $order->gateway;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance - $amount,
            'amount' => $amount,
            'nature' => 'Debit',
            'debit' => $amount,
            'credit' => 0,
            'country_id' => $order->country_id,
            'description' => 'PKR '.$amount.' was added to vendor account from an order #'.$order->id,
        ]);
        $account->update([
            'balance' => $account->balance - $amount
        ]);
    }
    public static function CompanyOrderCommission($order){
        // dd($order);
        $CompanyAccount = Account::find(1);
        $Vendoraccount = $order->vendor->account;
        $commission = ($order->subtotal * SetValue::CompanyCommission())/100;


        Transaction::create([
            'account_id' => $Vendoraccount->id,
            'opening' => $Vendoraccount->balance,
            'closing' => $Vendoraccount->balance - $commission,
            'amount' => $commission,
            'nature' => 'Debit',
            'debit' => $commission,
            'credit' => 0,
            'country_id' => $order->country_id,
            'profit' => $order->tax + $order->shipping + $commission,
            'description' =>  'PKR ' . $commission . ' was deduct as Company Commission of order# ' . $order->id . '.',
        ]);

        Transaction::create([
            'account_id' => $CompanyAccount->id,
            'opening' => $CompanyAccount->balance,
            'closing' => $CompanyAccount->balance +  $commission,
            'amount' => $commission,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' =>  $commission,
            'country_id' => $order->country_id,
            'description' =>  'PKR ' . $commission . ' was recieved as Company Commission of order# ' . $order->id . '.',
        ]);

        $CompanyAccount->update([
            'balance' => $CompanyAccount->balance + $commission,
        ]); 
        
        $Vendoraccount->update([
            'balance' => $Vendoraccount->balance - $commission,
        ]);

    }

    public static function UserBalanceAdd($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $request->balance,
            'amount' => $request->balance,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' =>  $request->balance,
            'description' =>  'PKR ' . $request->balance . '  was added in Account by Company '. $request->description . '.',
        ]);
    }

    public static function UserBalanceSub($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance -  $request->balance,
            'amount' => $request->balance,
            'nature' => 'Debit',
            'debit' => $request->balance,
            'credit' =>  0,
            'description' =>  'PKR ' . $request->balance . '  was subtract from Account by Company '. $request->description . '.',
        ]);
    }

    public static function VendorBalanceAdd($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $request->balance,
            'amount' => $request->balance,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' =>  $request->balance,
            'description' =>  'PKR ' . $request->balance . '  was added in Account by Company '. $request->description.'.',
        ]);
    }

    public static function VendorBalanceSub($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance -  $request->balance,
            'amount' => $request->balance,
            'nature' => 'Debit',
            'debit' => $request->balance,
            'credit' =>  0,
            'description' =>  'PKR ' . $request->balance . '  was subtract from Account by Company '. $request->description.'.',
        ]);
    }
    public static function CompanyBalanceAdd($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance +  $request->balance,
            'amount' => $request->balance,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' =>  $request->balance,
            'description' =>  'PKR ' . $request->balance . '  was added in Company Account '.$request->description.'.',
        ]);
    }
    public static function CompanyBalanceSub($request,$account){

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance -  $request->balance,
            'amount' => $request->balance,
            'nature' => 'Debit',
            'debit' => $request->balance,
            'credit' =>  0,
            'description' =>  'PKR ' . $request->balance . '  was subtract from Company Account '.$request->description.'.',
        ]);
    }


    public static function profit($order){

        $account = Account::where('user_id',1)->first();
        $commission = ($order->subtotal * SetValue::CompanyCommission())/100;
        $account->update([
            'profit' => $account->profit + $order->tax + $order->shipping + $commission
        ]);
    }
}