<?php

namespace App\Models;

use App\Traits\UserMethods;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
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
        'password'
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

    public function Roles(){
        return $this->hasMany(AssingRole::class);
    }

    public function HasRole($id){
        $role = AssingRole::where('admin_id',$this->id)->where('role_id',$id)->first();
        if($role)
            return true;
        else
            return false;
    }
    
    public function checkRole($checkroute){

        $roles = $this->Roles;
        if($roles){
            foreach ($roles as $role) {
                $routes = RoleRoute::where('role_id',$role->role_id)->get();
                if($routes){
                    foreach($routes as $route){
                        if($route->name == $checkroute){
                            return true;
                        }
                    }
                }else{
                    return false;
                }
            }
        }
        return false;

        
    }

    public static function AdminregisterRules()
    {
        return [
            'name'=>'max:255|required',
            'email'=>'email|required|unique:admins',
            'password' => 'required|min:6',
        ];
    }



}
