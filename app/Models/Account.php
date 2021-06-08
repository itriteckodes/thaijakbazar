<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'vendor_id',
        'balance',
        'profit'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //RelationShips//
    public function owner(){
        if($this->vendor_id != null)
            return $this->belongsTo(Vendor::class, 'vendor_id');
        else
            return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,'account_id');
        
    }
}
