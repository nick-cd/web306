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
 * Routes that store data in the database use the post() method to inidcate that they are using the POST HTTP request method. Routs that update data use the put() method to replicate the PUT HTTP method. Routes that delete data use the delete() method to replicate the DELETE HTTP request method.
 * Routes that are used for editing, updating or deleting data need to pass the ID to the controller in the URL.
 */

Route::get('/', 'App\Http\Controllers\ArtistsController@index');

Route::get('/add', 'App\Http\Controllers\ArtistsController@create');
Route::get('/store', 'App\Http\Controllers\ArtistsController@store');

Route::get('/{id}/edit', 'App\Http\Controllers\ArtistsController@edit');
Route::get('/{id}/update', 'App\Http\Controllers\ArtistsController@update');

Route::get('/{id}/destroy', 'App\Http\Controllers\ArtistsController@destroy');
