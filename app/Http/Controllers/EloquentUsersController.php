<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EloquentUsersController extends Controller
{
    //
    public function index()
    {
    	$users = User::all();
    	return view('eloquent.index',['users'=>$users]); 
    }
	
	public function createuser()
	{
		return view('eloquent.createuser');
	}
	
	public function storeuser(Request $request)
	{
		$user = new User();
		$this->validate($request, User::$rules);
		$user->create($request->all());
		return redirect()->route('eloquent.user.list');
	}
	
	public function deleteuser($id)
	{
		$user = User::find($id);
		$user->delete();
		return redirect()->route('eloquent.user.list');
	}
}
