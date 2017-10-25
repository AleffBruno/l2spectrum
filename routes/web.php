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
    return view('welcome');
});

Route::get('mostraecho','EloquentAccountsController@mostraecho');


Route::group(['prefix'=>'eloquent','as'=>'eloquent.'],function(){
	Route::get('accounts','EloquentAccountsController@index')->name('account.list');
	Route::get('accounts/create','EloquentAccountsController@create')->name('account.create');
	Route::post('accounts/store','EloquentAccountsController@store')->name('account.store');
});

Route::get('minharota/hello',function(){
	return view('helloworld');
});

Route::get('minharota',function(){
	echo "hello world";
})->name('name_minharota');

Route::get('client/{id}/{name?}',function($id,$name='nada'){
	return view('client-name',[
			'id_chave' => $id,
			'name_chave' => $name
	]);
});

Route::post('client',function(){
	echo "formulario enviado";
});