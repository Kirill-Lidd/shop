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

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/order', 'AdminController@view_order')->name('view_order');
Route::get('/admin/product', 'AdminController@view_product')->name('view_product');
Route::get('/admin/category', 'AdminController@view_category')->name('view_category');
Route::post('/admin/product/create', 'AdminController@create_product')->name('create_product');
Route::post('/admin/category/create', 'AdminController@create_category')->name('create_category');



Route::get('/', 'HomeController@index')->name('index');
Route::get('/search', 'ProductController@search')->name('search');
Route::get('/category/{cat}', 'ProductController@showProduct')->name('showProduct');
Route::get('/description/{id}', 'ReviewController@description')->name('description');
Route::post('/description/{id}/review', 'ReviewController@create_review')->name('create_review');



Route::post('/register', 'UserContorller@reg')->name('register');
Route::post('/login', 'UserContorller@login')->name('login');
Route::get('/logout', 'UserContorller@logout')->name('logout');

Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/cart/order', 'ProductController@order')->name('order');
Route::post('/cart/confirm', 'ProductController@confirm_order')->name('confirm_order');
Route::get('/cart/add/{id}', 'ProductController@add_to_cart')->name('add_to_cart');
Route::get('/cart/delete_all', 'ProductController@delete_all')->name('delete_all');
Route::get('/cart/delete/{id}', 'ProductController@delete_product')->name('delete_product');



Route::get('/favorites', 'ProductController@favorite_index')->name('favorite_index');
Route::get('/favorites/add/{id}', 'ProductController@add_to_favorite')->name('add_to_favorite');
Route::get('/favorites/delete/{id}', 'ProductController@delete_favorite')->name('delete_favorite');
// 




	
	