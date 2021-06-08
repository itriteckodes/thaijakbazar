<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'city',
        'address',
        'note',
        'code',
        'subtotal',
        'shipping',
        'tax',
        'discount',
        'grand_total',
        'vendor_id',
        'country_id'
    ];

    public function items(){
        return $this->hasMany(CheckoutItem::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
