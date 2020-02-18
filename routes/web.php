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
    return view('users.layout'); // Redirect ke users/layout.blade.php
});
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('users/create','UserController@create')->name('users.create');
Route::post('users/create','UserController@store')->name('users.store');