<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
        'name', 'email', 'address', 'shop_name','mobile','image','status','created_by','updated_by',
    ];
}
