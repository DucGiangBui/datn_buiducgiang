<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Admin\SocialInfoController;
use App\Http\Controllers\Admin\TemplateCardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\ClientController;



Route::get('/', function () {
    return view('client.homes.index');
})->name('homepage');

Route::get('/orders',  function(){
    return view('client.homes.orders');
})->name('orders');

Route::get('/infos',  function(){
    return view('guest.index');
})->name('infos');

Route::get('/myInfos',  function(){
    return view('guest.index');
})->name('myInfos');

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->middleware('checklogin')->name('dashboard');

Route::middleware(['checklogin'])->group(function () {
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Route cho 'socialInfos' với middleware kiểm tra vai trò 'admin'
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('socialInfos', [SocialInfoController::class, 'index'])->name('socialInfos.index');
        Route::get('socialInfos/create', [SocialInfoController::class, 'create'])->name('socialInfos.create');
        Route::post('socialInfos', [SocialInfoController::class, 'store'])->name('socialInfos.store');
        Route::get('socialInfos/{socialInfo}', [SocialInfoController::class, 'show'])->name('socialInfos.show');
        Route::get('socialInfos/{socialInfo}/edit', [SocialInfoController::class, 'edit'])->name('socialInfos.edit');
        Route::put('socialInfos/{socialInfo}', [SocialInfoController::class, 'update'])->name('socialInfos.update');
        Route::delete('socialInfos/{socialInfo}', [SocialInfoController::class, 'destroy'])->name('socialInfos.destroy');
    });

    // Route cho 'templateCards' với middleware kiểm tra vai trò 'admin'
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('templateCards', [TemplateCardController::class, 'index'])->name('templateCards.index');
        Route::get('templateCards/create', [TemplateCardController::class, 'create'])->name('templateCards.create');
        Route::post('templateCards', [TemplateCardController::class, 'store'])->name('templateCards.store');
        Route::get('templateCards/{templateCard}', [TemplateCardController::class, 'show'])->name('templateCards.show');
        Route::get('templateCards/{templateCard}/edit', [TemplateCardController::class, 'edit'])->name('templateCards.edit');
        Route::put('templateCards/{templateCard}', [TemplateCardController::class, 'update'])->name('templateCards.update');
        Route::delete('templateCards/{templateCard}', [TemplateCardController::class, 'destroy'])->name('templateCards.destroy');
    });
});

// routes/web.php

Route::middleware('auth')->group(function () {
    Route::get('/profile/index', [ClientController::class, 'index'])->name('profile.index');
    Route::get('/user/{id}', [ClientController::class, 'show'])->name('user.show');
    Route::get('/profile/edit', [ClientController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ClientController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ClientController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit/avatar', [ClientController::class, 'editAvatar'])->name('profile.edit.avatar');
    Route::get('/profile/edit/info', [ClientController::class, 'editInfo'])->name('profile.edit.info');
    Route::get('/profile/edit/social/{id}', [ClientController::class, 'editSocial'])->name('profile.edit.social');
    Route::post('/profile/update/social/{id}', [ClientController::class, 'updateSocial'])->name('profile.update.social');
});

// Route::resource('users',UserController::class);
// Route::resource('socialInfos', SocialInfoController::class);
// Route::resource('templateCards',TemplateCardController::class);


Route::resource('infos',GuestController::class);

