<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('eloquent/login');
})->name('login');

Route::get('mostraecho',['middleware'=>'loggedMine','uses'=>'EloquentAccountsController@mostraecho']);

//tem que estar logado
Route::group(['middleware'=>'loggedMine','prefix'=>'eloquent','as'=>'eloquent.'],function(){

	//accounts
	Route::get('accounts/{id}','EloquentAccountsController@index')->name('account.list');
	Route::get('accounts/create','EloquentAccountsController@create')->name('account.create');
	Route::post('accounts/store','EloquentAccountsController@store')->name('account.store');
	Route::get('accounts/delete/{login}','EloquentAccountsController@delete')->name('account.delete');
	Route::get('accounts/updateview/{login}','EloquentAccountsController@updateaccount_view')->name('account.updateaccountview');
	Route::post('accounts/update/{login}','EloquentAccountsController@updateaccount')->name('account.updateaccount');
	
	
	//users
	Route::get('users','EloquentUsersController@index')->name('user.list');
	Route::get('users/delete/{id}','EloquentUsersController@deleteuser')->name('user.delete');
	Route::get('users/updateview/{id}','EloquentUsersController@updateuser_view')->name('user.updateuserview');
	Route::post('users/update/{id}','EloquentUsersController@updateuser')->name('user.update');
	Route::get('users/createaccount/{id}','EloquentUsersController@createaccount')->name('user.createaccount');
	Route::get('users/veraccounts','EloquentUsersController@veraccounts')->name('user.veraccounts');
});

//livres
Route::group(['prefix'=>'eloquent','as'=>'eloquent.'],function(){
	//users
	Route::get('users/createuser','EloquentUsersController@createuser')->name('user.createuser');
	Route::post('users/storeuser','EloquentUsersController@storeuser')->name('user.store');
	Route::get('login','EloquentUsersController@login_get')->name('user.login');
	Route::post('login','EloquentUsersController@login_post')->name('user.login');
	
});

//logout
Route::get('logout',['uses'=>'EloquentUsersController@logoutUser','as'=>'logout']);


Route::get('client/{id}/{name?}',function($id,$name='nada'){
	return view('client-name',[
			'id_chave' => $id,
			'name_chave' => $name
	]);
});

