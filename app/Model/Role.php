<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{


 protected $fillable = [
        'role_name',
    ];


     public function user(){
    	return $this->hasMany('App\User');
    }
}
