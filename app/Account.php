<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
	public $timestamps = false;
	
    protected $fillable = [
    	'login','password','lastactive','access_level','lastIP','lastServer'
    ];
    
    public $rules = [
    	'login' => 'required|min:3|max:45',
    	'password' => 'required|max:45'
    ];
}
