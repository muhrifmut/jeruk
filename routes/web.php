<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('landing.home');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'home'], function () {
	Route::resource('pegawai', 'PegawaiController');
	Route::resource('menu', 'MenuController');
	Route::resource('bahan', 'BahanController');

	Route::get('/', function () {
    	return view('home.index');
	});
});