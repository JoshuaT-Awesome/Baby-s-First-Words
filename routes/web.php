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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::resource('/', 'WordController');

Route::get('/{word}', 'WordController@show');
Route::get('/{word}/edit', 'WordController@edit');
Route::put('/{word}', 'WordController@update');
Route::delete('/{word}', 'WordController@destroy');
