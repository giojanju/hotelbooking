<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
	Route::prefix('hotels')->name('hotels.')->group(function () {
	    Route::post('json', 'HotelController@json')->name('json');
	    Route::post('json/{id}', 'HotelController@single')->name('single');
	    Route::post('create', 'HotelController@create')->name('create');
	    Route::post('update/{id}', 'HotelController@update')->name('update');
	    Route::post('delete/{id}', 'HotelController@delete')->name('delete');
	});

	Route::prefix('services')->name('services.')->group(function () {
	    Route::post('json', 'ServiceController@json')->name('json');
	    Route::post('json/{id}', 'ServiceController@single')->name('single');
	    Route::post('create', 'ServiceController@create')->name('create');
	    Route::post('update/{id}', 'ServiceController@update')->name('update');
	    Route::post('delete/{id}', 'ServiceController@delete')->name('delete');
	});

	Route::prefix('pricing')->name('pricing.')->group(function () {
	    Route::post('json', 'PricingController@json')->name('json');
	    Route::post('json/{id}', 'PricingController@single')->name('single');
	    Route::post('create', 'PricingController@create')->name('create');
	    Route::post('update/{id}', 'PricingController@update')->name('update');
	    Route::post('delete/{id}', 'PricingController@delete')->name('delete');
	});
});
