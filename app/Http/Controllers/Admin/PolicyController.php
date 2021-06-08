<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    public function TermsCondition(Request $request){
        // dd($request);
        $data = Policy::where('key','terms')->where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->terms
        ]);
        toastr()->success('Terms & Conditions Updated');
        return redirect()->back();
        
    } 
    
    public function RefundPolicy(Request $request){
        // dd($request);
        $data = Policy::where('key','refund')->where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->refund
        ]);

        toastr()->success('Refund Policy Updated');
        return redirect()->back();
    }

    public function ReplacementPolicy(Request $request){
        $data = Policy::where('key','replacement')->where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->replacement
        ]);

        toastr()->success('Replacement Policy Updated');
        return redirect()->back();
    }
    
    public function PrivacyPolicy(Request $request){
        $data = Policy::where('key','privacy')->where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->privacy
        ]);

        toastr()->success('Privacy Policy Updated');
        return redirect()->back();
    }    
    public function AboutUs(Request $request){
        $data = Policy::where('key','aboutus')->where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->aboutus
        ]);

        toastr()->success('About Us Updated');
        return redirect()->back();
    }
}
