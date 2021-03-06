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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/', 'Auth\LoginController@login');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'home'], function () {

	Route::resource('pegawai', 'PegawaiController');

	Route::resource('menu', 'MenuController');
	Route::get('menubaru', 'PagesController@notverifikasi');
	#Setujui Menu
	Route::get('verifikasi/{id}', 'PagesController@verifikasi');

	Route::resource('bahan', 'BahanController');

	Route::resource('meja', 'MejaController');

	Route::resource('pesanan', 'PesananController');
	Route::get('pesanan/buat/{id}', 'PagesController@pesananbuat');
	Route::get('pesanan/selesai/{id}', 'PagesController@pesananselesai');

	Route::resource('pembayaran', 'PembayaranController');

	Route::resource('kuisioner', 'KuisionerController');

	Route::get('/', function () {
    	return view('home.index');
	});
});