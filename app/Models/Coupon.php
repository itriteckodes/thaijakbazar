<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [ 
        'name','rate','code','vendor_id','country_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
}
