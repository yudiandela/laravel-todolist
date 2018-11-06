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

Route::get('/', 'TodoController@index')->name('todo.index');
Route::post('/', 'TodoController@store')->name('todo.store');
Route::delete('/{todo}', 'TodoController@destroy')->name('todo.destroy');
Route::get('/{todo}/edit', 'TodoController@show')->name('todo.edit');
Route::put('/{todo}', 'TodoController@update')->name('todo.update');
Route::patch('/{todo}', 'TodoController@check')->name('todo.check');
