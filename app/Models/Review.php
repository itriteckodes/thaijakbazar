<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment'
    ];

    protected $appends = [
        'user'
    ];

    public function getUserAttribute(){
        return $this->user()->first();
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}