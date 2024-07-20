<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Admin\SocialInfoController;
use App\Http\Controllers\Admin\TemplateCardController;
use App\Http\Controllers\Client\TempCardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\CardController;



Route::get('/', [TempCardController::class, 'index'])->name('homepage');
Route::get('/orders', [TempCardController::class, 'order_index'])->name('orders');

Route::get('/card-info/{cardUrl}', [CardController::class, 'handleCardInfo'])->name('card.info');
Route::get('/infos/{linkUrl}', [GuestController::class, 'index'])->name('myInfos');

Route::post('/neworders', [OrderController::class, 'store'])->name('neworders.store');

Auth::routes();

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth','checkrole:admin'])->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('socialInfos', [SocialInfoController::class, 'index'])->name('socialInfos.index');
        Route::get('socialInfos/create', [SocialInfoController::class, 'create'])->name('socialInfos.create');
        Route::post('socialInfos', [SocialInfoController::class, 'store'])->name('socialInfos.store');
        Route::get('socialInfos/{socialInfo}', [SocialInfoController::class, 'show'])->name('socialInfos.show');
        Route::get('socialInfos/{socialInfo}/edit', [SocialInfoController::class, 'edit'])->name('socialInfos.edit');
        Route::put('socialInfos/{socialInfo}', [SocialInfoController::class, 'update'])->name('socialInfos.update');
        Route::delete('socialInfos/{socialInfo}', [SocialInfoController::class, 'destroy'])->name('socialInfos.destroy');

        Route::get('templateCards', [TemplateCardController::class, 'index'])->name('templateCards.index');
        Route::get('templateCards/create', [TemplateCardController::class, 'create'])->name('templateCards.create');
        Route::post('templateCards', [TemplateCardController::class, 'store'])->name('templateCards.store');
        Route::get('templateCards/{templateCard}', [TemplateCardController::class, 'show'])->name('templateCards.show');
        Route::get('templateCards/{templateCard}/edit', [TemplateCardController::class, 'edit'])->name('templateCards.edit');
        Route::put('templateCards/{templateCard}', [TemplateCardController::class, 'update'])->name('templateCards.update');
        Route::delete('templateCards/{templateCard}', [TemplateCardController::class, 'destroy'])->name('templateCards.destroy');

        Route::get('cards', [CardController::class, 'index'])->name('cards.index');
        Route::get('cards/create', [CardController::class, 'create'])->name('cards.create');
        Route::post('cards', [CardController::class, 'store'])->name('cards.store');
        Route::get('cards/{id}', [CardController::class, 'show'])->name('cards.show');
        Route::get('cards/{id}/edit', [CardController::class, 'edit'])->name('cards.edit');
        Route::put('cards/{id}', [CardController::class, 'update'])->name('cards.update');
        Route::delete('cards/{id}', [CardController::class, 'destroy'])->name('cards.destroy');

        Route::get('ordersMaster', [OrderAdminController::class, 'index'])->name('ordersMaster.index');
        Route::get('ordersMaster/create', [OrderAdminController::class, 'create'])->name('ordersMaster.create');
        Route::post('ordersMaster', [OrderAdminController::class, 'store'])->name('ordersMaster.store');
        Route::get('ordersMaster/{id}', [OrderAdminController::class, 'show'])->name('ordersMaster.show');
        Route::get('ordersMaster/{id}/edit', [OrderAdminController::class, 'edit'])->name('ordersMaster.edit');
        Route::put('ordordersMasterers/{id}', [OrderAdminController::class, 'update'])->name('ordersMaster.update');
        Route::delete('ordersMaster/{id}', [OrderAdminController::class, 'destroy'])->name('ordersMaster.destroy');
});

// routes/web.php

Route::middleware('auth')->group(function () {
    Route::get('/profile/index', [ClientController::class, 'index'])->name('profile.index');
    Route::get('/user/{id}', [ClientController::class, 'show'])->name('user.show');
    Route::get('/profile/card', [ClientController::class, 'cardindex'])->name('profile.card');
    Route::get('/profile/create', [ClientController::class, 'createSocial'])->name('profile.create');
    Route::post('/profile/store/social', [ClientController::class, 'storeSocial'])->name('profile.store.social');
    Route::get('/profile/edit', [ClientController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ClientController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/delete', [ClientController::class, 'destroySocial'])->name('profile.destroy');
    Route::post('/profile/update-url', [ClientController::class, 'updateUrl'])->name('profile.updateUrl');
    Route::get('/profile/edit/avatar', [ClientController::class, 'editAvatar'])->name('profile.edit.avatar');
    Route::get('/profile/edit/info', [ClientController::class, 'editInfo'])->name('profile.edit.info');
    Route::get('/profile/edit/social/{id}', [ClientController::class, 'editSocial'])->name('profile.edit.social');
    Route::post('/profile/update/social/{id}', [ClientController::class, 'updateSocialInfo'])->name('profile.update.social');
});


// Route::resource('users',UserController::class);
// Route::resource('socialInfos', SocialInfoController::class);
// Route::resource('templateCards',TemplateCardController::class);


