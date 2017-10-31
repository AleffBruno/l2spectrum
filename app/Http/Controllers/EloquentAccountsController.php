<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

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
    	$account = new Account();
    	$this->validate($request, Account::$rules);
    	$account->create($request->all());
    	return redirect()->route('eloquent.account.list');
    }
    
}
