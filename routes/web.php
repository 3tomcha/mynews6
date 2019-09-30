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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('news/', 'Admin\NewsController@index');
    Route::get('news/create', 'Admin\NewsController@create');
    Route::post('news/', 'Admin\NewsController@store');
    Route::get('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/', 'Admin\ProfileController@store');
    // Route::get('profile/edit', 'Admin\ProfileController@edit');
    // Route::post('profile/edit', 'Admin\ProfileController@update');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
