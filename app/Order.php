<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user_id', 
        'ip_address', 
        'name', 
        'email', 
        'phone', 
        'shipping_address', 
        'message', 
        'phone', 
        'is_paid',  
        'is_completed', 
        'is_seen'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function carts()
    {
    	return $this->hasMany(Cart::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
