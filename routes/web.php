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

Route::get('view-purchases', 'PurchasesController@view')->name('view.purchases');
Route::resource('offerings', 'OfferingsController');
Route::resource('purchases', 'PurchasesController');

Route::get('/home', 'HomeController@index')->name('home');
