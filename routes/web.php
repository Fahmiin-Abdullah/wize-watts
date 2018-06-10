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

//MAIN PAGE
Route::view('/', 'main');

//AUTH
Route::post('/signup', 'Auth\RegisterController@register')->name('signup');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//SHOP PAGE
Route::view('/shop', 'shop');
