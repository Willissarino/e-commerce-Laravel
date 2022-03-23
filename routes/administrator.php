<?php

use App\Http\Controllers\Administrator\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrator\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrator\Auth\NewPasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrator\Auth\RegisteredUserController;
use App\Http\Controllers\Administrator\Auth\VerifyEmailController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrator')->name('administrator.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administrator');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administrator')
        ->name('dashboard');

    //  Categories

    Route::get('/categories', [CategoryController::class, 'index'])
        ->middleware('auth:administrator')
        ->name('categories');

    Route::get('/add-categories', [CategoryController::class, 'create'])
        ->middleware('auth:administrator')
        ->name('add.categories');

    Route::post('store-category', [CategoryController::class, 'store'])
        ->name('store.categories');
    
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])
        ->middleware('auth:administrator')
        ->name('edit.categories');
    
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])
        ->middleware('auth:administrator')
        ->name('update.categories');

    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])
        ->middleware('auth:administrator')
        ->name('delete.categories');

    // End of Categories

    //  Products

    Route::get('/product', [ProductController::class, 'index'])
        ->middleware('auth:administrator')
        ->name('product');

    Route::get('/add-product', [ProductController::class, 'create'])
        ->middleware('auth:administrator')
        ->name('add.product');

    Route::post('store-product', [ProductController::class, 'store'])
        ->name('store.product');
    
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])
        ->middleware('auth:administrator')
        ->name('edit.product');
    
    Route::put('/update-product/{id}', [ProductController::class, 'update'])
        ->middleware('auth:administrator')
        ->name('update.product');

    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])
        ->middleware('auth:administrator')
        ->name('delete.product');

    //  End of Products

    
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:administrator');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrator');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:administrator')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:administrator')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:administrator')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:administrator', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:administrator', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:administrator')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:administrator');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrator')
        ->name('logout');
});
