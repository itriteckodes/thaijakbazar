<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssingRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'role_id'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function routes(){
        return $this->hasMany(RoleRoute::class,'role_id');
    }
}
