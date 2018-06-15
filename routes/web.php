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

Route::resource('/','principalController');
Route::resource('grupo','grupoController')->middleware('auth');
Route::resource('pais','paisController')->middleware('auth');
Route::resource('lugar','lugarController')->middleware('auth');
Route::resource('partido','partidoController')->middleware('auth');

Route::get('/login','Auth\LoginController@show')->middleware('guest');
Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');