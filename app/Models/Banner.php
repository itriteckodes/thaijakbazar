<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'image',
        'end_time',
    ];

    protected $casts = [
        'end_time' => 'datetime'
    ];

    public function setImageAttribute($value){
	    if(is_string($value)){
	        $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images/banner'); 
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images/banner');
	    }
    }

    public function getImageAttribute($value){
        return asset($value);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
