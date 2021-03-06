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
Route::get('cp/login', 'Cp\Auth\LoginController@showLoginForm')->name('login');
Route::post('cp/login', 'Cp\Auth\LoginController@login')->name('post.login');
Route::post('cp/logout', 'Cp\Auth\LoginController@logout')->name('logout');

Route::prefix('cp')->middleware('auth')->name('cp.')->namespace('Cp')->group(function () {
	
	Route::get('/', 'IndexController@index')->name('home');

	Route::prefix('categories')->name('categories.')->group(function () {
		Route::get('/', 'CategoryController@index')->name('index');
		Route::get('create', 'CategoryController@create')->name('create');
		Route::post('create', 'CategoryController@store')->name('store');
		Route::get('remove/{id}', 'CategoryController@remove')->name('remove');
		Route::get('edit/{menu}', 'CategoryController@edit')->name('edit');
		Route::post('update/{menu}', 'CategoryController@update')->name('update');
	});

	Route::prefix('services')->name('services.')->group(function () {
		Route::get('/', 'ServiceController@index')->name('index');
		Route::get('create', 'ServiceController@create')->name('create');
		Route::post('create', 'ServiceController@store')->name('store');
		Route::get('remove/{id}', 'ServiceController@remove')->name('remove');
		Route::get('edit/{service}', 'ServiceController@edit')->name('edit');
		Route::post('update/{service}', 'ServiceController@update')->name('update');
	});

	Route::prefix('hotels')->name('hotels.')->group(function () {
		Route::get('/', 'HotelController@index')->name('index');
		Route::get('create', 'HotelController@create')->name('create');
		Route::post('create', 'HotelController@store')->name('store');
		Route::get('remove/{id}', 'HotelController@remove')->name('remove');
		Route::get('edit/{hotel}', 'HotelController@edit')->name('edit');
		Route::post('update/{hotel}', 'HotelController@update')->name('update');
	});

	Route::prefix('hotel-services')->name('hotel_services.')->group(function () {
		Route::get('/', 'HotelServiceController@index')->name('index');
		Route::get('create', 'HotelServiceController@create')->name('create');
		Route::post('create', 'HotelServiceController@store')->name('store');
		Route::get('remove/{id}', 'HotelServiceController@remove')->name('remove');
		Route::get('edit/{service}', 'HotelServiceController@edit')->name('edit');
		Route::post('update/{service}', 'HotelServiceController@update')->name('update');
	});
	
	Route::prefix('sliders')->name('sliders.')->group(function () {
		Route::get('/', 'SliderController@index')->name('index');
		Route::post('create', 'SliderController@store')->name('store');
		Route::get('remove/{id}', 'SliderController@remove')->name('remove');
	});	

	Route::prefix('settings')->name('settings.')->group(function () {
		Route::get('/', 'SettingController@index')->name('index');
		Route::post('create', 'SettingController@store')->name('store');
	});
});

Route::get('{slug}', function() {
    return view('app');
})->where('slug', '(?!api)([A-z\d-\/_.]+)?');
