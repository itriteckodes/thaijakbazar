<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMethod extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name','image','country_id'
    ];

    public function getImageAttribute($value){
        return asset($value);
    }

    public function setImageAttribute($value){
	    if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images/gateway'); 
	    }
    }
}
