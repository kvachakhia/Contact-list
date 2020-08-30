<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContactController@index')->name('addContact');



Route::prefix('contact')->name('contact.')->group(function () {
    Route::post('/add', 'ContactController@store')->name('addContact');
    Route::get('/edit/{id}', 'ContactController@edit')->name('editContact');
    Route::post('/update/{id}', 'ContactController@update')->name('updateContact');
    Route::post('/delete/{id}', 'ContactController@destroy')->name('deleteContact');
});