<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'account_id',
        'opening',
        'closing',
        'amount',
        'nature',
        'debit',
        'credit',
        'description',
        'profit',
        'country_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function account (){
        return $this->belongsTo(Account::class);
    }
    
}
