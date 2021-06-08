<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    // status pending : 0
    // status completed : 1
    // status rejected :2

    protected $fillable = [
        'amount',
        'status',
        'withdrawaccount_id',
        'description',
        'country_id'
    ];

    public function withdrawAccount(){
      return $this->belongsTo(WithdrawAccount::class, 'withdrawaccount_id');
    }   

}