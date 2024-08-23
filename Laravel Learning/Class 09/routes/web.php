<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guard');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/login', function () {
   session()->put('user_id',1);
   return redirect('/');
});
Route::get('/logout', function () {
   session()->forget('user_id');
   return redirect('/');
});

//Protected By Route Middleware
Route::get('/no-access', function () {
    echo 'login first';
    die;
});
