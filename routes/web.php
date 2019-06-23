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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// routes

Route::get('/products', 'products\ProductController@show_all_products')->name('list_products');
Route::get('/products/{id}', 'products\ProductController@showproduct')->name('single_product');
Route::get('/add_to_cart/{id}', 'products\ProductController@add_to_cart')->name('add_to_cart');
Route::get('/cart', 'products\ProductController@cart')->name('cart');
Route::get('/checkout', 'products\ProductController@checkout')->name('checkout');
