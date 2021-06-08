<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function ChangeLanguage($id){
        Session::put('country_id', $id);
        return redirect()->route('front.home');
    }

    public function GetTickets(){
        
        $admin = Auth::guard('admin')->loginUsingId(1);

        return redirect('tickets');

    }
    public function Tickects(){
        
        $tickets = Ticket::where('country_id',1)->orderBy('updated_at','desc')->get();
        return view('admin.ticket.tickets')->with('tickets',$tickets);

    }

}
