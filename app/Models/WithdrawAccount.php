<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Helpers\WithdrawStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendor_id',
        'title',
        'account_no',
        'image',
        'description',  
        'status',
        'withdrawmethod_id'
    ];

    public function setImageAttribute($value){
	    if(is_string($value)){
	        $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images/gateway'); 
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images/gateway');
	    }
    }

    public function owner(){
        if($this->user_id)
            return $this->belongsTo(User::class,'user_id');
        else
            return $this->belongsTo(Vendor::class,'vendor_id');
    }
    
    public function withdrawMethod(){
        return $this->belongsTo(WithdrawMethod::class,'withdrawmethod_id');
    }

    public function pendingWithdrawReuqests(){
        return $this->hasMany(WithdrawRequest::class, 'withdrawaccount_id')->where('status',WithdrawStatus::pending())->get();
    }
    
    public function rejectedWithdrawReuqests(){
        return $this->hasMany(WithdrawRequest::class, 'withdrawaccount_id')->where('status',WithdrawStatus::rejected())->get();
    }
    
    public function completedWithdrawReuqests(){
        return $this->hasMany(WithdrawRequest::class, 'withdrawaccount_id')->where('status',WithdrawStatus::completed())->get();
    }

   
}
