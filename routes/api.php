<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAPI;
use App\Http\Controllers\AdminAuthControllerAPI;
use App\Http\Controllers\Frontend\FrontendController;

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

// Product List
// Get featured category
Route::get('category', [FrontendController::class, 'getCategoryAPI']);
// Get specific category
Route::get('category/{slug}', [FrontendController::class, 'viewCategoryAPI']);
// Get specific product
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewProductAPI']);



// Get featured product
Route::get('featured-product', [FrontendController::class, 'getFeaturedAPI']);
// Get all available product
Route::get('product', [FrontendController::class, 'viewAllProductAPI']);
// Get specific product
Route::get('product/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewProductAPI']);


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
