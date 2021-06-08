<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'note',
        'subtotal',
        'shipping',
        'tax',
        'discount',
        'grand_total',
        'status',
        'gateway_id',
        'vendor_id',
        'paid',
        'comment',
        'country_id'
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function items(){
        return $this->hasMany(OrderItems::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    } 
    
    public function user(){
        return $this->belongsTo(User::class);
    }   
    
    public function isFromRegisteredUser(){
        return $this->user_id != null;
    } 
    
    public function gateway(){
        return $this->belongsTo(Gateway::class);
    }   
}
