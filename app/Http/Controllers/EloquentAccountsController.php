<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;

class EloquentAccountsController extends Controller
{
    public function index()
    {
    	$accounts = Account::all();
    	return view('eloquent.index',['accounts'=>$accounts]); 
    }
    
    public function mostraecho()
    {
    	echo "foo";
    }
    
    public function create()
    {
    	return view('eloquent.create');
    }
    
    public function store(Request $request)
    {
    	$account = new Account();
    	$this->validate($request, Account::$rules);
    	$account->create($request->all());
    	
    	return redirect(route('eloquent.user.list'));
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
    
}
