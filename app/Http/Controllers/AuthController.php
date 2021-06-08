<?php

namespace App\Http\Controllers;

use App\Helpers\MailHelper;
use App\Helpers\Validate;
use App\Models\Account;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $credentials = Validate::register($request, User::class);
        $user = User::create($credentials);
        Account::create([
            'user_id' => $user->id,
            'type' =>'user',
            'balance' =>0,
        ]);
        Auth::login($user);
        toastr()->success('Registered Successfully', 'Done');
        return redirect()->route('front.home');
    }

    public function login(Request $request)
    {
        $remember = $request->remember == 'on' ? true : false;

        $credentials = Validate::login($request, User::class);

        if (Auth::attempt($credentials, $remember)) {
            if(Auth::user()->status == true){
                toastr()->error('Your Account is Blocked');
                Auth::logout();
                return redirect()->back();
            }else{
                Session::put('country_id', Auth::user()->country_id);
                return redirect()->intended(route('front.home'));
            }
            
        }else{
            toastr()->error('Incorrect email or password');
            return redirect()->back()->withInput();
        }
       
    }

    public function VendorLogin(Request $request){

        $remember = $request->remember == 'on' ? true : false;

        $credentials = Validate::login($request, User::class);
        if(Auth::guard('vendor')->attempt($credentials, $remember)){
            if (Auth::guard('vendor')->user()->email_verify == false) {
                toastr()->error('Please Verify Your Email Address First');
                Auth::guard('vendor')->logout();
                return redirect()->back();
            }elseif(Auth::guard('vendor')->user()->status == true){
                toastr()->error('You Are Blocked');
                Auth::guard('vendor')->logout();
                return redirect()->back();
            }else{
                Session::put('country_id', Auth::guard('vendor')->user()->country_id);
                toastr()->success('Login as Vendor');
                return redirect()->intended(route('vendor.dashboard'));
            }
        }else{
            toastr()->error('Incorrect email or password');
            return redirect()->back()->withInput();
        }
    }

    public function registerVendor(Request $request)
    {
        $credentials = Validate::VendorRegister($request, Vendor::class, true);

        $vendor = Vendor::create($credentials);

        Account::create([
            'vendor_id' => $vendor->id,
            'type' =>'vendor',
            'balance' =>0,
        ]);

        // MailHelper::SendEmailCode($vendor);

        // toastr()->success('Check Your Mailbox ', 'Please Verify Email');

        toastr()->success('Registered Sucessfully', 'Done');


        return redirect()->route('vendor.login');
    }

    public function verifyEmail($code){
        $vendor = Vendor::where('email_verify_code',$code)->first();
        $vendor->update([
            'email_verify' =>true,
        ]);
        toastr()->success('Email Verify Sucessfully', 'Done');
        return redirect()->route('front.home');

    }

    public function logout()
    {  
        Auth::logout();
        return redirect()->route('front.home');
    }

    public function sendForget(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $vendor = Vendor::where('email',$request->email)->first();
       
        if($user){
            $user->code = Str::random(30);
            $user->save();
            Mail::send('mail.verification', ['user' => $user], function ($mail) use ($user){
                $mail->from('support@jakbazar.com', 'JackBazar');
                $mail->to($user->email, $user->name)
                ->subject('Email Verification');
            });

            toastr()->success('Password reset link send to your Mail','Please Check Your Mail Box');
            return redirect()->route('login');

        }elseif($vendor){
            $vendor->code = Str::random(30);
            $vendor->save();
            Mail::send('mail.verification', ['user' => $vendor], function ($mail) use ($vendor){
                $mail->from('support@jakbazar.com', 'JackBazar');
                $mail->to($vendor->email, $vendor->name)
                ->subject('Email Verification');
            });

            toastr()->success('Password reset link send to your Mail','Please Check Your Mail Box');
            return redirect()->route('login');
        }else{
            toastr()->error('Wrong Email');
            return redirect()->back();
        }
    }

    public function verify($code)
    {
        
        $user = User::where('code',$code)->first();
        if($user){
            return view('user.auth.reset')->with('user',$user);
        }
    }
    
    public function ResetPassword(Request $request){
        
        $user = User::where('code',$request->code)->first();
        $user->password = $request->password;
        $user->code = null;
        $user->save();
        toastr()->success('Password Changed', 'Successfully');
        return redirect()->route('login');
    }
}
