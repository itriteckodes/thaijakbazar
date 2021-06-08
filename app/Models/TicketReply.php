<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'message',
        'admin_read',
        'opponent_read',
        'ticket_id',
        'admin_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);  
    }
}
