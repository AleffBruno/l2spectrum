<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;

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
	
	public function updateuser_view($id)
	{
		$userToUpdate = User::find($id);
		return view('eloquent.updateuserview',['userToUpdate'=>$userToUpdate]);
	}
	
	public function updateuser($id , Request $request)
	{
		//$name = $request->input('name');
		$userToUpdate = User::find($id);
		
// 		if($request['name'] == "" || $request['name'] == null)
// 		{
// 			$request['name'] = $userToUpdate->name;
// 		}
		
// 		if($request['email'] == "" || $request['email'] == null)
// 		{
// 			$request['email'] = $userToUpdate->email;
// 		}
		
// 		if($request['password'] == "" || $request['password'] == null)
// 		{
// 			$request['password'] = $userToUpdate->password;
// 		}
		
		$this->validate($request, User::$rules);
		
		$userToUpdate->name = $request['name'];
		$userToUpdate->email = $request['email'];
		$userToUpdate->password = $request['password'];
		$userToUpdate->save();
		
		return redirect()->route('eloquent.user.list');

	}
	
	public function createaccount($id)
	{
		$user = User::find($id);
		return view('eloquent.createaccount',['userid'=>$user->id]);
	}
	
	public function veraccounts($id)
	{
		$accounts = Account::where('user_fk', $id)->get();
		$user = User::find($id);
		return view('eloquent.listagensdeaccounts',['accounts'=>$accounts,'user_name'=>$user->name]);
		
	}
	
}
