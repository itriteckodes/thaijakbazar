<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','image','mobileimage','handle','country_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function setImageAttribute($value){
	    if(is_string($value)){
	        $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images/category'); 
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveResizedImage($value,'images/category',16,16);
	    }
    }

    public function setMobileimageAttribute($value){

	  if(is_file($value)){
	        $this->attributes['mobileimage'] = ImageHelper::saveResizedImage($value,'images/category',128,128); 
	    }
    }
    public function setNameAttribute($value){
	    
	    $this->attributes['name'] = $value;
        $this->attributes['handle'] = str_replace(' ','_',$value); 
	   
    }

	public function getImageAttribute($value){
        return asset($value);
    }
    
    public function getMobileimageAttribute($value){
        return asset($value);
    }

    public function subcategories(){
        return $this->hasMany(SubCategory::class,'cat_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'cat_id');
    }
}
