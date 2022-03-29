<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAPI;
use App\Http\Controllers\AdminAuthControllerAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public route (User)
// Register a new user
Route::post('register', [AuthControllerAPI::class, 'registerAPI']);
// Login
Route::post('login', [AuthControllerAPI::class, 'loginAPI']);

// Authenticated Group Only
Route::group(['middleware' => ['auth:sanctum']], function()
{
    // Fetch authenticated user
    Route::get('me',function(Request $request)
    {
        return auth()->user();
    });
    
    // Logout (User)
    Route::post('logout', [AuthControllerAPI::class, 'logoutAPI']);

    // Logout (Admin)
    Route::post('admin/logout', [AdminAuthControllerAPI::class, 'logoutAPI']);
});

// Public route (Admin)
// Login
Route::post('admin/login', [AdminAuthControllerAPI::class, 'loginAPI']);
