<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function index(){
        return view('admin.news-subscribers.index');
    }
 
    public function setMail(Request $request)
    {
        $subscribers = NewsLetter::all();
        // dd($subscribers);
        if($subscribers){
            foreach ($subscribers as  $subscriber) {
                $subscriber->save();
                $this->sendMail($subscriber, $request);
            }
        }

        toastr()->success('News Send to Subscribers');
        return  redirect()->back(); 
    }
    private function sendMail($subscriber, $request)
    {
      
        $data = ['msg' => $request];
        Mail::send('mail.newsletter', $data, function ($message) use ($subscriber){
            $message->from('jakbazar@support.com', 'Jak Bazar');
            $message->to($subscriber->email,'User')
            ->subject('News');
        });
    }
}
