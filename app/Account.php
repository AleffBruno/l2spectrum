<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [
    	'login','password','lastactive','access_level','lastIP','lastServer'
    ];
}
