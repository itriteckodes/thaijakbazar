<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{
    use HasFactory;

    protected $fillable  = [
        'checkout_id',
        'product_id',
        'qty',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
