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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HouseholdaccountbookController@index');
    Route::get('householdaccountbook/create', 'Admin\HouseholdaccountbookController@add');
    Route::post('householdaccountbook/create', 'Admin\HouseholdaccountbookController@create');
    Route::get('householdaccountbook/edit', 'Admin\Householda ccountbookController@edit');
    Route::post('householdaccountbook/edit', 'Admin\HouseholdaccountbookController@update');
    Route::get('householdaccountbook/delete', 'Admin\HouseholdaccountbookController@delete');
});
