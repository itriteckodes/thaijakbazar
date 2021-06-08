<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Validate{

    public static function login($request, $model){

        $validator = Validator::make($request->all(),$model::loginRules());
        
        if($validator->fails()){
            toastr()->error($validator->errors()->first());
            Redirect::to(route('login'))->withInput()->send();
        }
        else
            return[
                'email' => $request->email,
                'password' => $request->password
            ];
    }
    
    public static function register($request, $model, $addVerification = false){

        $validator = Validator::make($request->all(),$model::registerRules());
        
        if($validator->fails()){
            toastr()->error($validator->errors()->first());
            Redirect::to(route('user.register'))->withInput()->send();
            
        }
        else{
            $data = [ 'api_token' => Str::random(60) ] + $request->all();
            if($addVerification) $data['email_verify_code'] = Str::random(20);
            return $data;
        }
          
    }

    public static function VendorRegister($request, $model, $addVerification = false){

        $validator = Validator::make($request->all(),$model::VendorRegisterRules());
        
        if($validator->fails()){
            toastr()->error($validator->errors()->first());
            Redirect::to(route('register'))->withInput()->send();
        }
        else{
            $data = [ 'api_token' => Str::random(60) ,'email_verify' => true] + $request->all();
            if($addVerification) $data['email_verify_code'] = Str::random(20);
            return $data;
        }
          
    }


    public static function Adminregister($request, $model, $addVerification = false){

        $validator = Validator::make($request->all(),$model::AdminregisterRules());
        
        if($validator->fails()){
            toastr()->error($validator->errors()->first());
            Redirect::to(route('admin.admins.index'))->withInput()->send();
        }
        else{
            $data = [ 'api_token' => Str::random(60) ] + $request->all();
            return $data;
        }
          
    }




}