<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use Illuminate\Support\Facades\Auth;
use Gate;

class EloquentAccountsController extends Controller
{
	
    public function index($id)
    {
		//$user = User::find(Auth::user()->id);
		/* if (Gate::denies('actionAccount', $id)) 
		{
			//return \Redirect::back();
			abort(403,'Nao autorizado');
		} */
		

		$user = User::find($id);
		$accounts = $user->getAccounts;
		
		/*
    	if($user->isAdmin())
    	{
    		$user = User::find($id);
    		$accounts = $user->getAccounts;
    	}else{
    		$accounts = $user->getAccounts;
    	}
    	*/
    	//$accounts = $user->getAccounts;
    	
    	//$accounts = Account::all();
		//return view('eloquent.listagensdeaccounts',['accounts'=>$accounts,'user_name'=>User::find($id)['name']]); 
		return view('eloquent.listagensdeaccounts',['accounts'=>$accounts,'user_name'=>$user->name]); 
    }
    
    public function create()
    {
    	return view('eloquent.create');
    }
    
    public function store($id,Request $request)
    {
		if (Gate::denies('actionAccount', $id)) 
		{
			//return \Redirect::back();
			abort(403,'Nao autorizado');
		}

		//$user = User::find(Auth::user()->id);
		$user = User::find($id);
		$account = new Account();
		$this->validate($request,  Account::$rules);
		if($account->find($request->login) == null)
		{
			$account->fill($request->all());
			$user->getAccounts()->save($account);
			return redirect(route('eloquent.account.list',Auth::user()->id));
		}else{
			return \Redirect::back()->withInput()->withErrors("Account aready exists");
		}
    }
    
    public function delete($login)
    {
		if(Gate::denies('actionsWithLoginParamAccount',$login))
		{
			//return \Redirect::back();
			abort(403,'Nao autorizado');
		}

		$account = Account::where('login',$login)->get()->first()->delete();
		
    	return back();
    }
    
    public function updateaccount_view($login)
    {
    	$accountToUpdate = Account::find($login);
    	$userid = $accountToUpdate->getUser;
    	return view('eloquent.updateaccountview',['accountToUpdate'=>$accountToUpdate,'userid'=>$userid['id']]);
    }
    
    public function updateaccount($login,Request $request)
    {
		if(Gate::denies('actionsWithLoginParamAccount',$login))
		{
			//return \Redirect::back();
			abort(403,'Nao autorizado');
		}
		
    	$accountToUpdate = Account::find($login);
    	$user = $accountToUpdate->getUser;
		$this->validate($request, Account::$rules);
		if($request->login != $accountToUpdate->login)
		{
			if(Account::find($request->login) != null)
			{
				return \Redirect::back()->withInput()->withErrors("Account aready exists");
			}
		}

    	$accountToUpdate->login = $request['login'];
    	$accountToUpdate->password = $request['password'];
    	$accountToUpdate->lastactive= $request['lastactive'];
    	$accountToUpdate->access_level= $request['access_level'];
    	$accountToUpdate->lastIP= $request['lastIP'];
    	$accountToUpdate->lastServer= $request['lastServer'];
    	
    	$accountToUpdate->save();

		return redirect(route('eloquent.account.list',$user->id));
    }
    
}
