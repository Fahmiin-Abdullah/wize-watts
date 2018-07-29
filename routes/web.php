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
Route::get('/search', 'ShopController@search')->name('search');

//AUTH
Route::post('/signup', 'Auth\RegisterController@register')->name('signup');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::view('/admin/dashboard', 'admin.dashboard');

//PASSWORD RESET
Route::get('/password/reset/', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

//SHOP PAGE
Route::get('/shop', 'ShopController@showPage')->name('shopPage');
Route::get('/shop/catalog/{cat}/{subcat}', 'ShopController@getCatalog')->name('getCatalog');
Route::get('/shop/catalog/{id}', 'ShopController@getCategory')->name('getCategory');
Route::get('/products/view/{id}', 'Admin\ProductController@viewProduct')->name('viewProduct');
Route::post('/products/review/{id}', 'ReviewController@writeReview')->name('writeReview');
Route::post('/products/review/edit/{id}', 'ReviewController@editReview')->name('editReview');
Route::delete('/products/review/delete/{id}', 'ReviewController@deleteReview')->name('deleteReview');

Route::get('/shop/addtocart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/cart', 'CartController@showCart')->name('showCart');
Route::get('/cart/delete/{id}', 'CartController@deleteItem')->name('deleteItem');
Route::post('/cart/checkout', 'OrderController@createOrder')->name('createOrder');



//PROFILE PAGE
Route::get('/profile', 'ProfileController@showProfile')->name('profilePage');
Route::post('/profile/edit/info/{id}', 'ProfileController@editInfo')->name('editInfo');
Route::get('/profile/info/{id}', 'ProfileController@fetchInfo')->name('fetchInfo');
Route::post('/profile/edit/address/{id}', 'ProfileController@editAddress')->name('editAddress');

//FAVORITES
Route::post('/favorite/{id}', 'ShopController@createFav')->name('createFav');



//ADMIN
Route::view('/admin/dashboard', 'admin.dashboard');

Route::get('/admin/products', 'Admin\AdminController@showProducts')->name('adminProducts');
Route::get('/admin/products/suboptions/{id}', 'Admin\ProductController@getSuboptions')->name('getSuboptions');
Route::post('/admin/products/new', 'Admin\ProductController@createProduct')->name('createProduct');
Route::get('/admin/products/getEdit/{id}', 'Admin\ProductController@getEdit')->name('getEditProduct');
Route::post('/admin/products/edit/{id}', 'Admin\ProductController@editProduct')->name('editProduct');
Route::delete('/admin/products/delete/{id}', 'Admin\ProductController@deleteProduct')->name('deleteProduct');
Route::get('/admin/products/{params}/{sort}', 'Admin\AdminController@sortProduct')->name('sortProduct');
Route::post('/admin/products/search', 'Admin\AdminController@searchProduct')->name('searchProduct');

Route::get('/admin/customers', 'Admin\AdminController@showCustomers')->name('adminCustomers');
Route::get('/admin/customer/{id}', 'Admin\AdminController@getCustomer')->name('getCustomer');

Route::post('/admin/mailinglist', 'Admin\AdminController@addMailingList')->name('addMailingList');
Route::post('/admin/mailinglist/{id}', 'Admin\AdminController@addMailingList')->name('addMailingListReg');
Route::get('/admin/mailinglist', 'Admin\AdminController@showMailList')->name('showMailList');
Route::delete('/admin/mailinglist/delete/{id}', 'Admin\AdminController@deleteMail')->name('deleteMail');

Route::post('/admin/category', 'Admin\CategoriesController@createCategory')->name('createCategory');
Route::delete('/admin/category/delete/{id}', 'Admin\CategoriesController@deleteCategory')->name('deleteCategory');
Route::post('/admin/subcategory', 'Admin\CategoriesController@createSubcategory')->name('createSubcategory');
Route::get('/admin/subcategory/{id}', 'Admin\CategoriesController@getSubcategory')->name('getSubcategory');
Route::delete('/admin/subcategory/delete/{id}', 'Admin\CategoriesController@deleteSubcategory')->name('deleteSubcategory');
Route::post('/admin/tag', 'Admin\CategoriesController@createTag')->name('createTag');
Route::delete('/admin/tag/delete/{id}', 'Admin\CategoriesController@deleteTag')->name('deleteTag');

Route::get('/admin/orders', 'Admin\AdminController@showOrders')->name('showOrders');
Route::post('/admin/status/{id}', 'OrderController@statusUpdate')->name('statusUpdate');