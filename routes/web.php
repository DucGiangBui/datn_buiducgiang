<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\RoleController;


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
    return view('client.homes.index');
})->name('app');
Route::get('/dashboard',  function(){
    return view('admin.dashboard.index');
})->name('dashboard');
Route::get('/orders',  function(){
    return view('client.homes.orders');
})->name('orders');
Auth::routes();

Route::resource('roles',RoleController::class);
