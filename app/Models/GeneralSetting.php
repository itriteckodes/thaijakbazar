<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'logo',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'commision',
        'country_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getLogoAttribute($value){
        return asset($value);
    }

    public function setLogoAttribute($value){
	   
	   if(is_file($value)){
	        $this->attributes['logo'] = ImageHelper::saveResizedImage($value,'images/logo',640,182); 
	    }
    }
}
