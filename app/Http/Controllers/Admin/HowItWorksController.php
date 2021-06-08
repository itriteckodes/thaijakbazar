<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HowItWorksController extends Controller
{
    public function HowItWorks(Request $request){
        // dd($request);
        $data = HowItWorks::where('country_id',Session::get('country_id'))->first();

        $data->update([
            'data' => $request->privacy
        ]);

        toastr()->success('Details Updated');
        return redirect()->back();
    }
}
