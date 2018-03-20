<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use Illuminate\Support\Facades\Auth;

class EloquentAccountsController extends Controller
{
    public function index()
    {
    	$accounts = Account::all();
    	return view('eloquent.index',['accounts'=>$accounts]); 
    }
    
    public function create()
    {
    	return view('eloquent.create');
    }
    
    public function store(Request $request)
    {
    	//verificar se a FK que vai pra accounts é do user logado
    	if($request->user_fk == Auth::user()->id)
    	{
    		$account = new Account();
    		$this->validate($request, Account::$rules);
    		$account->create($request->all());
    		return redirect(route('eloquent.user.list'));
    	}
    	
    	return redirect()->back();
    }
    
    public function delete($login)
    {
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
    	$accountToUpdate = Account::find($login);
    	$userid = $accountToUpdate->getUser;
    	$this->validate($request, Account::$rules);
    	
    	$accountToUpdate->login = $request['login'];
    	$accountToUpdate->password = $request['password'];
    	$accountToUpdate->lastactive= $request['lastactive'];
    	$accountToUpdate->access_level= $request['access_level'];
    	$accountToUpdate->lastIP= $request['lastIP'];
    	$accountToUpdate->lastServer= $request['lastServer'];
    	
    	$accountToUpdate->save();
    	
    	return redirect()->route('eloquent.user.list');
    }
    
}
