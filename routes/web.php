<?php

use Illuminate\Support\Facades\Route;

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



Route::group([ 'prefix' => 'account'], function() {

	Route::group([ 'middleware' => 'guest'], function() {


		Route::get('/login', [
		    'uses' => 'App\Http\Controllers\Auth\LoginController@getLogin',
		    'as' => 'user.login'
		]);

		Route::post('/login', [
		    'uses' => 'App\Http\Controllers\Auth\LoginController@postLogin',
		    'as' => 'user.login'
		]);

		Route::get('/register', [
		    'uses' => 'App\Http\Controllers\Auth\RegisterController@getRegister',
		    'as' => 'user.register'
		]);

		Route::post('/register', [
		    'uses' => 'App\Http\Controllers\Auth\RegisterController@postRegister',
		    'as' => 'user.register'
		]);

		Route::get('/password/{token}', [
		    'uses' => 'App\Http\Controllers\Auth\PasswordController@getPassword',
		    'as' => 'user.password'
		]);

		Route::post('/password', [
		    'uses' => 'App\Http\Controllers\Auth\PasswordController@postPassword',
		    'as' => 'user.password.update'
		]);

		
	});


});

	Route::group([ 'middleware' => ['auth', 'checkusersession']], function() {

		Route::get('/logout', [
	        'uses' => 'App\Http\Controllers\Auth\LoginController@logout',
	        'as' => 'user.logout',
        ]);

        Route::get('/client/create', [
		    'uses' => 'App\Http\Controllers\ClientController@create',
		    'as' => 'client.create'
		]);


		Route::post('/client/store', [
		    'uses' => 'App\Http\Controllers\ClientController@store',
		    'as' => 'client.store'
		]);

		// update && show single client
		Route::get('/client/edit/{id}', [
		    'uses' => 'App\Http\Controllers\ClientController@edit',
		    'as' => 'client.edit'
		]);

		// update && show single client
		Route::get('/client/show/{id}', [
		    'uses' => 'App\Http\Controllers\ClientController@show',
		    'as' => 'client.show'
		]);


		Route::post('/client/update/{id}', [
		    'uses' => 'App\Http\Controllers\ClientController@update',
		    'as' => 'client.update'
		]);

		// all clients

		Route::get('/client/index', [
		    'uses' => 'App\Http\Controllers\ClientController@index',
		    'as' => 'clients'
		]);

		Route::get('/client/delete/{id}', [
		    'uses' => 'App\Http\Controllers\ClientController@destroy',
		    'as' => 'client.destroy'
		]);




		// add
		Route::get('/city/create', [
		    'uses' => 'App\Http\Controllers\CityController@create',
		    'as' => 'city.create'
		]);


		Route::post('/city/store', [
		    'uses' => 'App\Http\Controllers\CityController@store',
		    'as' => 'city.store'
		]);

		Route::get('/city/show/{id}', [
		    'uses' => 'App\Http\Controllers\CityController@show',
		    'as' => 'city.show'
		]);


		// update && show single city
		Route::get('/city/edit/{id}', [
		    'uses' => 'App\Http\Controllers\CityController@edit',
		    'as' => 'city.edit'
		]);


		Route::post('/city/update/{id}', [
		    'uses' => 'App\Http\Controllers\CityController@update',
		    'as' => 'city.update'
		]);

		// all city

		Route::get('/city/index', [
		    'uses' => 'App\Http\Controllers\CityController@index',
		    'as' => 'city'
		]);

		Route::get('/city/delete/{id}', [
		    'uses' => 'App\Http\Controllers\CityController@destroy',
		    'as' => 'city.destroy'
		]);


		Route::get('/user/index', [
		    'uses' => 'App\Http\Controllers\UserController@index',
		    'as' => 'users'
		]);

		Route::get('/user/show/{id}', [
		    'uses' => 'App\Http\Controllers\UserController@show',
		    'as' => 'user.show'
		]);

		Route::get('/user/edit/{id}', [
		    'uses' => 'App\Http\Controllers\UserController@edit',
		    'as' => 'user.edit'
		]);

		Route::get('/user/delete/{id}', [
		    'uses' => 'App\Http\Controllers\UserController@destroy',
		    'as' => 'user.destroy'
		]);

		Route::post('/user/update', [
		    'uses' => 'App\Http\Controllers\UserController@update',
		    'as' => 'user.update'
		]);


	});

