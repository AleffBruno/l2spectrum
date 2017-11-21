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
	
	public function updateuser($id , Request $request)
	{
		//$name = $request->input('name');
		$userToUpdate = User::find($id);
		
		if($request['name'] == "" || $request['name'] == null)
		{
			$request['name'] = $userToUpdate->name;
		}
		
		if($request['email'] == "" || $request['email'] == null)
		{
			$request['email'] = $userToUpdate->email;
		}
		
		if($request['password'] == "" || $request['password'] == null)
		{
			$request['password'] = $userToUpdate->password;
		}
		
		
		return route('eloquent.user.update');
		if($this->validate($request, User::$rules))
		{
			echo "bom";
		}else{
			echo "ruim";
		}
		
		
		
		
		
		
		
// 		$userToUpdate->name = $request['name'];
// 		$userToUpdate->email = $request['email'];
// 		$userToUpdate->password = $request['password'];
// 		$userToUpdate->save();

		
		
		
		
		/*
		if($request['name'] == "" || !isset($request['name']))
		{
			$userToUpdate->name = $userToUpdate['name'];
		}else{
			$userToUpdate->name = $request['name'];
		}
		if($request['email'] == "" || !isset($request['email']))
		{
			$userToUpdate->email = $userToUpdate['email'];
		}else{
			$userToUpdate->email = $request['email'];
		}
		if($request['password'] == "" || !isset($request['password']))
		{
			$userToUpdate->password = $userToUpdate['password'];
		}else{
			$userToUpdate->password = $request['password'];
		}
		
		$userToUpdate->save();
		*/
	}
}
