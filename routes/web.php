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
Route::view('/', 'users.main');

//AUTH
Route::post('/signup', 'Auth\RegisterController@register')->name('signup');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//PASSWORD RESET
Route::get('/password/reset/', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

//SHOP PAGE
Route::get('/shop', 'ShopController@showPage')->name('shopPage');
Route::get('/products/view/{id}', 'Admin\ProductController@viewProduct')->name('viewProduct');
Route::post('/products/review/{id}', 'ReviewController@writeReview')->name('writeReview');
Route::post('/products/review/edit/{id}', 'ReviewController@editReview')->name('editReview');
Route::delete('/products/review/delete/{id}', 'ReviewController@deleteReview')->name('deleteReview');

//PROFILE PAGE
Route::get('/profile', 'ProfileController@showProfile')->name('profilePage');
Route::post('/profile/edit/info/{id}', 'ProfileController@editInfo')->name('editInfo');
Route::post('/profile/edit/address/{id}', 'ProfileController@editAddress')->name('editAddress');



//ADMIN
Route::view('/admin/dashboard', 'admin.dashboard');
Route::get('/admin/products', 'Admin\AdminController@showProducts')->name('adminProducts');
Route::post('/admin/products/new', 'Admin\ProductController@createProduct')->name('createProduct');
Route::get('/admin/products/getEdit/{id}', 'Admin\ProductController@getEdit')->name('getEditProduct');
Route::post('/admin/products/edit/{id}', 'Admin\ProductController@editProduct')->name('editProduct');
Route::delete('/admin/products/delete/{id}', 'Admin\ProductController@deleteProduct')->name('deleteProduct');