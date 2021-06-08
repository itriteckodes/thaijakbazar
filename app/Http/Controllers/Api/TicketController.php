<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request){
        
        Ticket::create($request->all());
    }

    public function getTicket(Request $request){

        $tickets = Ticket::where('hotel_id',$request->hotel_id)->orderBy('id','desc')->get();
        return $tickets;
    }
    public function getTicketReplies(Request $request){
        $tickets = Ticket::find($request->id);
        $tickets->Replies;
        return $tickets;
    }
    public function storeTicketReply(Request $request){
        $tickets = TicketReply::create($request->all());
    }

    public function getCustomerTickets(Request $request){

        $tickets = Ticket::where('customer_id',$request->customer_id)->orderBy('id','desc')->get();
        return $tickets;
    }
}
