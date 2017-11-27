<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
	public $timestamps = false;
	
    protected $fillable = [
    	'login','password','lastactive','access_level','lastIP','lastServer','user_fk'
    ];
    
    protected $hidden = [
    		'password','user_fk'
    ];
    
    public static $rules = [
    		/*
    	'user_fk' => 'required',	
    	'login' => 'required|min:3|max:45|string',
    	'password' => 'max:45',
    	'lastactive' => 'numeric',
    	'access_level' => 'integer',
    	'lastIP' => 'ip',
    	'lastServer' => 'max:4|integer'
    	*/
    ];
}
