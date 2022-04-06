<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAPI;
use App\Http\Controllers\AdminAuthControllerAPI;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Frontend\UserController;

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

/*
|--------------------------------------------------------------------------
|
| PRODUCTS ROUTES (PUBLIC ROUTE)
|
|--------------------------------------------------------------------------
*/
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


/*
|--------------------------------------------------------------------------
|
| USER ROUTES
|
|--------------------------------------------------------------------------
*/
Route::post('register', [AuthControllerAPI::class, 'registerAPI']);
Route::post('login', [AuthControllerAPI::class, 'loginAPI']);

// Authenticated user routes
Route::middleware(['auth:sanctum', 'type.user'])->group(function () {
    // Fetch authenticated user
    Route::get('me',function(Request $request)
    {
        return auth()->user();
    });
    // User Dashboard
    Route::get('dashboard', [UserController::class, 'userDashboardAPI']);

    // Logout (User)
    Route::get('logout', [AuthControllerAPI::class, 'logoutAPI']);
});

/*
|--------------------------------------------------------------------------
|
| ADMINISTRATOR ROUTES
|
|--------------------------------------------------------------------------
*/
// Login
Route::post('admin/login', [AdminAuthControllerAPI::class, 'loginAPI']);

Route::middleware(['auth:sanctum', 'type.admin'])->group(function() {
    // Category
    Route::get('admin/category', [CategoryController::class, 'categoryAPI']);
    // Add category
    Route::post('admin/category/add', [CategoryController::class, 'addCategoryAPI']);
    // Edit category (return data in category table based on id)
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'editCategoryAPI']);
    // Update category
    Route::put('admin/category/update/{id}', [CategoryController::class, 'updateCategoryAPI']);
    // Delete category
    Route::delete('admin/category/delete/{id}', [CategoryController::class, 'deleteCategoryAPI']);

    // Product
    Route::get('admin/product', [ProductController::class, 'productAPI']);
    // Add Product
    Route::post('admin/product/add', [ProductController::class, 'addProductAPI']);
    // Edit Product (return data in product table based on id)
    Route::get('admin/product/edit/{id}', [ProductController::class, 'editProductAPI']);
    // Update Product
    Route::put('admin/product/update/{id}', [ProductController::class, 'updateProductAPI']);
    // Delete Product
    Route::delete('admin/product/delete/{id}', [ProductController::class, 'deleteProductAPI']);


    // Logout (Admin)
    Route::post('admin/logout', [AdminAuthControllerAPI::class, 'logoutAPI']);
});


// Authenticated Group Only
Route::group(['middleware' => ['auth:sanctum']], function()
{
    
});


