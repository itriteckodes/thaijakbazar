<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name','cat_id','handle','country_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'subcat_id');
    }
    
    public function setNameAttribute($value){
	    
	    $this->attributes['name'] = $value;
        $this->attributes['handle'] = str_replace(' ','_',$value); 
	   
    }

}