<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request){
        $email = NewsLetter::where('email',$request->email)->first();
        if($email){
            toastr()->error('Email Already Exist');
            return redirect()->back();
        }else{
            NewsLetter::create($request->all());
            toastr()->success('Subscribed');
            return redirect()->back();
        }
    }
}
