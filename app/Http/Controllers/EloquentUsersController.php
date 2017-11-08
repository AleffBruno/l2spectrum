<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EloquentUsersController extends Controller
{
    //
	public function createuser()
	{
		return view('eloquent.createuser');
	}
	
	public function storeuser(Request $request)
	{
		echo "user store";
		//$account = new Account();
		//$this->validate($request, Account::$rules);
		//$account->create($request->all());
		//return redirect()->route('eloquent.account.list');
	}
}
