<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

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

// Route::get('/', function () {
//     return view('homePage');
// });

// Frontend Route
Route::get('/',[FrontendController::class,'index'])
    ->name('homepage');
Route::get('/view-category/{slug}',[FrontendController::class,'viewCategory'])
    ->name('view.category');
Route::get('/view-category/{cate_slug}/{prod_slug}',[FrontendController::class,'viewProduct'])
    ->name('view.product');
Route::get('/view-product',[FrontendController::class,'viewAllProduct'])
    ->name('view.all.product');
Route::post('add-to-cart', [CartController::class, 'addProductCart'])
    ->name('add.cart');
Route::post('delete-cart-item', [CartController::class, 'deleteProductCart'])
    ->name('delete.cart');
Route::post('update-cart', [CartController::class, 'updateProductCart'])
    ->name('update.cart');


// Logged In User
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard',[UserController::class, 'index'])
        ->name('dashboard');

    // Update User Details
    Route::post('update-user-detail',[UserController::class, 'updateUserDetail'])
        ->name('update.user.detail');

    // View Cart
    Route::get('cart', [CartController::class, 'viewCart'])
        ->name('view.cart');
    // Checkout
    Route::get('checkout',[CheckoutController::class, 'index'])
        ->name('checkout');
    // Place Order
    Route::post('place-order',[CheckoutController::class, 'placeOrder'])
        ->name('place.order');
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/administrator.php';