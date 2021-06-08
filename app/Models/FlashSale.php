<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class FlashSale extends Model
{
    protected $fillable = [ 
        'product_id','end_time'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function product(){
     return $this->belongsTo(Product::class)->with('category')->with('subcategory');
    }

    public static function Flashproducts(){
        return (new static)::whereHas('product', function ($product) {
            $product->where('deleted', '!=', true)->where('country_id',Session::get('country_id'));
         })->get();
    }

}
