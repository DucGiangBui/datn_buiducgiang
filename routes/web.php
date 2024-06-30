<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Admin\SocialInfoController;


Route::get('/admin',[HomeController::class,'index'])->name('index');

Route::get('/', function () {
    return view('client.homes.index');
})->name('homepage');

Route::get('/dashboard',  function(){
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/orders',  function(){
    return view('client.homes.orders');
})->name('orders');

Route::get('/infos',  function(){
    return view('guest.index');
})->name('infos');

Route::get('/myInfos',  function(){
    return view('client.users.index');
})->name('myInfos');

Auth::routes();

Route::resource('roles',RoleController::class);
Route::resource('users',UserController::class);
Route::resource('socialInfos', SocialInfoController::class);
Route::get('/guest', [GuestController::class, 'index'])->name('guest.home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
