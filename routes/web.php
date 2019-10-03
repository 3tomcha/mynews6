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
    Route::get('news/{id}', 'Admin\NewsController@edit');
    Route::put('news/{id}', 'Admin\NewsController@update');
    Route::delete('news/{id}', 'Admin\NewsController@destroy');

    Route::get('profile/', 'Admin\ProfileController@index');
    Route::get('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/', 'Admin\ProfileController@store');
    Route::get('profile/{id}', 'Admin\ProfileController@edit');
    Route::put('profile/{id}', 'Admin\ProfileController@update');
    Route::delete('profile/{id}', 'Admin\ProfileController@destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
