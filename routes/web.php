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
<<<<<<< HEAD
    return view('landing.home');
});

Auth::routes();

Route::get('/home', 'PegawaiController@index');
=======
    return view('welcome');
});
>>>>>>> 322db19f3fbe8b6bdf731a12c5f972208c314ef1
