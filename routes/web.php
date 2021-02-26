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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'household_account_book'], function () {
        Route::get('/', 'Admin\HouseholdAccountBookController@index');
        Route::get('/create', 'Admin\HouseholdAccountBookController@add');
        Route::post('/create', 'Admin\HouseholdAccountBookController@create');
        Route::get('/edit', 'Admin\HouseholdAccountBookController@edit');
        Route::post('/edit', 'Admin\HouseholdAccountBookController@update');
        Route::get('/delete', 'Admin\HouseholdAccountBookController@delete');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HouseholdAccountBookController@index');