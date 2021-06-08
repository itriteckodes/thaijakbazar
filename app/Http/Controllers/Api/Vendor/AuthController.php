<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = ApiValidate::login($request, Vendor::class);

        if (Auth::guard('vendor_api')->attempt($credentials)) {
            return Api::setResponse('user', Auth::user());
        }
        return Api::setError('Invalid credentials');
    }
}
