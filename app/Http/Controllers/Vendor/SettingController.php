<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index(){
        $vendor = Auth::user();
        return view('vendor.setting.index')->with('vendor',$vendor);
    }

    public function update(Request $request){
        $vendor = Auth::user();
        $vendor->update($request->all());
        toastr()->info('your store settings were updated');
        return redirect()->back();
        
    }
}
