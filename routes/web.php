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

//Hello From Push And Pull Lessons

Route::get('/', 'ProductController@index')->name('products.index');

Route::resource('products', 'ProductController')->except(['index']);

Route::get('/addToCart/{product}', 'CartController@addToCart')->name('cart.add');

Route::get('/showCart', 'CartController@showCart')->name('cart.show');

Route::get('/deleteCart', 'CartController@deleteCart')->name('cart.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
