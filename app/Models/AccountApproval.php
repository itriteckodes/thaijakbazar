<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'vendor_id',
        'type',
        'status',
    ];

    public function user()
    {
        if ($this->type == 'user') {
            return $this->belongsTo(User::class,'user_id');
        } else {
            return $this->belongsTo(Vendor::class,'vendor_id');
        }
    }
}
