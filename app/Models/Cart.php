<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'qty',
        'coupon_id',
        'discount_rate',
        'coupon_success',
        'tax',
        'shipping',
        'discount',
        'sub_total',
        'grand_total',
        'items',
        'vendor_id',
    ];

    protected $casts = [
        'coupon_success' => 'boolean'
    ];

    public function getItems(){
        return json_decode($this->items);
    }
    
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

}
