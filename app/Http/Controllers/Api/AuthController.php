<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function freeRegister()
    {
        $user = User::create([
            'api_token' => Str::random(60)
        ]);
        return Api::setResponse('user', $user);
    }

    public function register(Request $request)
    {
        $credentials = ApiValidate::register($request, User::class);
        $user = User::create($credentials);
        Account::create([
            'user_id' => $user->id,
            'type' =>'user',
            'balance' =>0,
        ]);
        return Api::setResponse('user', $user->withToken());
    }

    public function login(Request $request)
    {
        $remember = $request->remember == 'on' ? true : false;

        $credentials = ApiValidate::login($request, User::class);
        if (Auth::attempt($credentials, $remember)) {
            $qty = Cart::qty();
            $response = new Api();
            $response->add('user', Auth::user()->withToken());
            $response->add('qty', $qty);
            return $response->json();
        } else
            return Api::setError('Invalid credentials');
    }

    public function sendForget(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        try{
            $user->code = Str::random(30);
            $user->save();
            Mail::send('mail.verification', ['user' => $user], function ($mail) use ($user){
                $mail->from('support@jakbazar.com', 'JackBazar');
                $mail->to($user->email, $user->name)
                ->subject('Email Verification');
            });

            return Api::setMessage('verification email sent');
        }
        catch(Exception $e){
            return Api::setError('Wrong email');
        }
    }
}
