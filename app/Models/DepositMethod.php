<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DepositMethod extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'country_id' ,'name','api_key','publishable_key','secret_key','status','image','handle'
    ];

    public function getImageAttribute($value){
        return asset($value);
    }

    public function setImageAttribute($value){
	    if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images/gateway'); 
	    }
    }

    public static function active(){
        return (new static)::where('status',false)->where('country_id',Auth::user()->country_id)->get();
    }
}
