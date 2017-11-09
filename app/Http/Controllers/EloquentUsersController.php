<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EloquentUsersController extends Controller
{
    //
	public function createuser()
	{
		return view('eloquent.createuser');
	}
	
	public function storeuser(Request $request)
	{
		
		$user = new User();
		$this->validate($request, User::$rules);
		$user->create($request->all());
		return redirect()->route('eloquent.account.list');
	}
}
