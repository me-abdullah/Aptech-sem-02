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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{name?}', function ($name = null) {
    $demo = "<h2>Abdullah Sheikh<h2/>";
    $data = compact('name', 'demo');
    return view('home')->with($data);
});
