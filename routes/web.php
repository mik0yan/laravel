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
    return view('web');
});

Route::get('/shop', function () {
    return view('web');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/web',function(){
    return view('web');
});
