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
    return view('home');
});

Route::group(['prefix' => 'spapers'], function () {
    Route::get('/', 'SpaperController@index')->name('spapers.index');
    Route::get('/create', 'SpaperController@create')->name('spapers.create');
    Route::post('/create', 'SpaperController@store')->name('spapers.store');
    Route::get('/{id}/edit', 'SpaperController@edit')->name('spapers.edit');
    Route::post('/{id}/edit', 'SpaperController@update')->name('spapers.update');
    Route::get('/{id}/destroy', 'SpaperController@destroy')->name('spapers.destroy');

});