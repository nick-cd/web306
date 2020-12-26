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

Route::resources([
    '/' => 'App\Http\Controllers\ArtistController',
    'artists' => 'App\Http\Controllers\ArtistController',
    'bios' => 'App\Http\Controllers\BioController',
    'artworks' => 'App\Http\Controllers\ArtworkController',
    'galleries' => 'App\Http\Controllers\GalleryController'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
