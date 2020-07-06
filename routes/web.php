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

//Products Routes
Route::get('/','ProductController@index')->name('products.index');
Route::get('/store/{slug}','ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');


//Cart Routes
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart/add', 'CartController@store')->name('cart.store');
Route::get('/cart/{rowId}','CartController@destroy')->name('cart.destroy');
Route::delete('/cart/{rowId}', 'CartController@destroy');


Route::get('/emptycart', function(){
    Cart::destroy();
});

//Checkout Routes
Route::get('/payment', 'CheckoutController@index')->name('checkout.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Chart Routes
Route::get('/statistique', 'ProductController@indexe')->name('products.chart');
