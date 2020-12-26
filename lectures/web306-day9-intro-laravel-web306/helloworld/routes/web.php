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
 * Aeverage web URLs are defined in the web.php file which is inside the routes folder.
 * 
 * Routes are created using the Route class and accessing static methods from it.
 * 
 * The get() method uses the GET HTTP request method. The first parameter it takes is the URL it is associated with and the second parameter is either a function which returns a Blade template using the view() function or the name of a controller and associated method to call.
 * 
 * The view function takes two parameters.
 * 
 * The first is a the name of a Blade template.
 * The second is an associative array of variables to pass to the template.
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloworld', function () {
    return view('helloworld', [
        'title' => 'Hello World!'
    ]);
});