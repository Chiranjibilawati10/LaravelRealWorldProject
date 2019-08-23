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

Route::get('habbit_list', 'MyHabbitController@index')->name('habbit_list');
Route::post('habbit_list/store', 'MyHabbitController@store')->name('habbit_list.store');
Route::get('habbit_list/{id}/edit', 'MyHabbitController@edit')->name('habbit_list.edit');
Route::post('habbit_list/{id}/update', 'MyHabbitController@update')->name('habbit_list.update');
Route::get('habbit_list/delete/{id}', 'MyHabbitController@delete')->name('habbit_list.delete');