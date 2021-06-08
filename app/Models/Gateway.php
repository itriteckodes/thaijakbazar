<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Helpers\Gateway as GatewayId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'country_id','name','api_key','publishable_key','secret_key','status','image','handle'
    ];

    public function getImageAttribute($value){
        return asset($value);
    }

    public function setImageAttribute($value){
	    if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images/gateway'); 
	    }
    }

    public function isWallet(){
        return $this->handle == 'walletpayment';
    }
    
    public function isCardPayment(){
        return $this->id == GatewayId::CardPayment();
    }
    
    public function isCOD(){
        return $this->handle == 'cod';
    }

    public function isRestricted(){
        if($this->id == GatewayId::paypal() || $this->id == GatewayId::jazzCash() || $this->id == GatewayId::easyPaisa()|| $this->id == GatewayId::ericCoin() || $this->id == GatewayId::jakCoin()) 
            return true;
        else
            return false;
    }

    
}
