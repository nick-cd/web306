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

Route::get('/', function() {

  $answers = [];

  // https://github.com/erusev/parsedown
  $parsedown = new Parsedown();

  // https://stackoverflow.com/questions/3977500/how-can-i-list-all-files-in-a-directory-sorted-alphabetically-using-php#3977514
  foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/../resources/answers/*') as $file) {
    $text = $parsedown->text(file_get_contents($file));
    array_push($answers, $text);
  }

  return view('welcome', [
    'answers' => $answers
  ]);
});
