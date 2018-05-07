<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Auth;

class EloquentUsersController extends Controller
{
    
	public function login_post(Request $request)
	{
		
		$user = User::where('email', $request['email'])
		->where('password', User::hashPassword($request['password']))
		->first();
		if($user==null)
		{
			return \Redirect::back()->withInput()->withErrors([User::$feedBackMessages['notMatch']]);
		}
		
		Auth::login($user);
		return redirect()->route('eloquent.user.list');
	}
	
	public function logoutUser()
	{
		Auth::logout();
		return redirect()->route('eloquent.user.login');
	}
	
	public function login_get(Request $request)
	{
		return view('eloquent/login');
	}
	
    public function index()
    {
		// ATENTE-SE A PEGADINHA DA RESPOSTA , VEJA SE É UMA COLLECTION(ARRAY)

		$user = User::find(Auth::user()->id);
		
		if($user->isAdmin())
		{
			$users = User::all();
			return view('eloquent.index',compact('users'));
		}else{
			$users = User::where('id',Auth::user()->id)->get();
		}

    	return view('eloquent.index',compact('users'));
    }
	
	public function createuser()
	{
		return view('eloquent.createuser');
	}
	
	public function storeuser(Request $request)
	{
		$user = new User();
		$this->validate($request, User::$rules);
		//$request['password'] = Hash::make($request['password']);
		$request['password'] = User::hashPassword($request['password']);
		$user->create($request->all());
		// este cara ainda nao esta autenticado
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
		$userToUpdate = User::find($id);
		
		$this->validate($request, User::$rules);
		if($request->email != $userToUpdate->email)
		{
			if(User::where('email',$request->email)->first() != null)
			{
				return \Redirect::back()->withInput()->withErrors("User aready exists");
			}
		}
		
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
	
	public function veraccounts()
	{
		return redirect()->route('eloquent.account.list');
		die();
		//$accounts = Account::where('user_fk', $id)->get();
		$user = User::find($id);
		
		$accounts = $user->getAccounts;
		
		/*
		foreach($accounts as $account)
		{
			echo ($account->login)."<br>";
		}
		*/
		return view('eloquent.listagensdeaccounts',['accounts'=>$accounts,'user_name'=>$user->name]);
		
	}
	
}
