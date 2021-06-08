<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'user_id',
        'rider_id',
        'hotel_id',
        'customer_id',
        'type',
        'ticket',
        'country_id',
    ];
    protected $appends = [
        'unread_replies'
    ];
    public function getUnreadRepliesAttribute(){
        return $this->hasMany(TicketReply::class)->where('opponent_read',false)->count();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function Replies(){
        return $this->hasMany(TicketReply::class,'ticket_id');
    }
}
