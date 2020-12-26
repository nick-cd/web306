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


/**
 * Planet Routes
 */
Route::get('/', '\App\Http\Controllers\PlanetController@index');

Route::get('/planet/add/', '\App\Http\Controllers\PlanetController@create');
Route::post('/planet/add/', '\App\Http\Controllers\PlanetController@store');

Route::get('/planet/edit/{id}', '\App\Http\Controllers\PlanetController@edit');
Route::put('/planet/edit/{id}', '\App\Http\Controllers\PlanetController@update');

Route::get('/planet/{id}', '\App\Http\Controllers\PlanetController@view');

Route::delete('/planet/delete/{id}', '\App\Http\Controllers\PlanetController@delete');

/**
 * Moon Routes
 */
Route::get('/moon/add', '\App\Http\Controllers\MoonController@create');
Route::post('/moon/add', '\App\Http\Controllers\MoonController@store');

Route::get('/moon/edit/{id}', '\App\Http\Controllers\MoonController@edit');
Route::put('/moon/edit/{id}', '\App\Http\Controllers\MoonController@update');

Route::delete('/moon/delete/{id}', '\App\Http\Controllers\MoonController@delete');
