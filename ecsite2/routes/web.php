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

Route::get('/', 'ItemController@index')->name('item.index');
Route::get('/item/{item}', 'ItemController@show')->name('item.show');
Route::post('/cartitem', 'CartItemController@store');
Route::get('/cartitem', 'CartItemController@index')->name('cartitem');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');