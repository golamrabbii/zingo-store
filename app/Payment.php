<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
        'name', 
        'image', 
        'name', 
        'priority', 
        'short_name', 
        'no', 
        'type', 
        
    ];
}
