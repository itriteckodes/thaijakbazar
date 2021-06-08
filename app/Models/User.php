<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Traits\UserMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,UserMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'api_token',
        'status',
        'gender',
        'dob',
        'city',
        'address',
        'balance',
        'image',
        'cnicfront',
        'cnicback',
        'approve',
        'rejected',
        'code',
        'country_id'
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
        'approve' => 'boolean'
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
        return $this->hasOne(Account::class, 'user_id');
    }

    public function canReviews(){
        return $this->hasMany(CanReview::class)->with('product');
    }
    
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function wishLists()
    {
        return $this->hasMany(WishList::class)->with('product');
    }
    
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
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
