<?php

use App\Http\Controllers\customer_controller;
use App\Models\Customer;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', function () {
    $customers = Customer::all();
    echo "<pre>";
    print_r($customers->toArray());
});

Route::get('/customer',[customer_controller::class, 'index']);
Route::get('/customer/view',[customer_controller::class, 'view']);
Route::get('customer/create/',[customer_controller::class, 'create'])->name('customer.create');
Route::get('customer/delete/{id}',[customer_controller::class, 'delete'])->name('customer.delete');
Route::get('customer/edit/{id}',[customer_controller::class, 'edit'])->name('customer.edit');
Route::post('customer/update/{id}',[customer_controller::class, 'update'])->name('customer.update');
Route::post('/customer',[customer_controller::class, 'store']);
