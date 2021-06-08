<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function User(){
        $user = Auth::user();
        return Api::setResponse('user',$user);
    }


    public function update(Request $request){
        $user= Auth::user();
        $user->update($request->all());
        return Api::setResponse('user',$user);
    }
}
