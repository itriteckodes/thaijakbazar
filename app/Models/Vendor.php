<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Helpers\OrderStatus;
use App\Helpers\WithdrawStatus;
use App\Traits\UserMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable, UserMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'password',
        'phone',
        'balance',
        'address',
        'phone',
        'description',
        'no_product',
        'image',
        'status',
        'tax_rate',
        'shipping_rate',
        'email_verify',
        'email_verify_code',
        'cnicfront',
        'cnicback',
        'approve',
        'code',
        'deleted',
        'country_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_token',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setCnicfrontAttribute($value){
        if(is_file($value)){
            $this->attributes['cnicfront'] = ImageHelper::saveImage($value,'images/profile');
        } else if (!empty($value)){
            $this->attributes['cnicfront'] = $value;
        }
    }
    
    public function getCnicfrontAttribute($value){
        return asset($value);
    }
    
    public function setCnicbackAttribute($value){
        if(is_file($value)){
            $this->attributes['cnicback'] = ImageHelper::saveImage($value,'images/profile');
        } else if (!empty($value)){
            $this->attributes['cnicback'] = $value;
        }
    }
    
    public function getCnicbackAttribute($value){
        return asset($value);
    }

    //RelationShips//
    public function account(){
        return $this->hasOne(Account::class, 'vendor_id');
    }

    public function coupans(){
        return $this->hasMany(Coupon::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    } 

    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function pendingorders(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::pending());
    }

   public function acceptedorders(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::accepted());
    }

   public function rejectedorders(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::rejected());
    }
    
    public function readyToShip(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::readyToShip());
    }

   public function dispatchedorders(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::dispatched());
    }
    
    public function deliveredorders(){
        return $this->hasMany(Order::class)->where('status', OrderStatus::delivered());
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class)->orderBy('updated_at','desc');
    }

    public function WithdrawAccounts()
    {
        return $this->hasMany(WithdrawAccount::class);
    }

    public function CanWithdrawAccount(){
        return $this->hasMany(WithdrawAccount::class)->where('status',1);
    }

}
