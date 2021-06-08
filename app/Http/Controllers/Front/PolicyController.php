<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HowItWorks;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    public function index($key){
        $policy = Policy::where('key',$key)->where('country_id',Session::get('country_id'))->first();
        return view('front.policy.index')->with('policy',$policy);
    }
    public function howitworks(){
      
        $howitworks = HowItWorks::where('country_id',Session::get('country_id'))->first();
        return view('front.info.howitworks')->with('howitworks',$howitworks);
    }
}
