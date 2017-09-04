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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/faq', 'FaqController@index')->name('faq');

Route::get('/myaccount', 'MyaccountController@index')->name('myaccount');

Route::get('/delete', 'MyaccountController@delete')->name('delete');

Route::post('/modificar', 'MyaccountController@modificar')->name('modificar');

Route::get('/vender', 'SellController@index')->name('sell');

Route::post('/vender', 'SellController@save')->name('sell');

Route::get('/buy', 'ProductController@index')->name('buy');

Route::get('/search', 'ProductController@search')->name('search');
