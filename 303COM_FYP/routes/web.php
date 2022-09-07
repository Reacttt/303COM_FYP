<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;

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

// Index Router
Route::get('/', [ViewController::class, 'homePage']);

// Customer Routers
Route::get('/register', [ViewController::class, 'registerPage']);
Route::get('/login', [ViewController::class, 'loginPage']);
Route::get('/category', [ViewController::class, 'categoryPage']);
Route::get('/product', [ViewController::class, 'productPage']);
Route::get('/cart', [ViewController::class, 'cartPage']);

Route::post('registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('loginUser', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');

// Admin Routers

Route::get('/admin', [ViewController::class, 'adminPage']);

Route::get('/addProduct', [ViewController::class, 'addProductPage']);
Route::post('addProduct', [ProductController::class, 'addProduct'])->name('addProduct');

Route::post('findProduct', [ProductController::class, 'findProduct'])->name('findProduct');

Route::get('/deleteProduct', [ViewController::class, 'deleteProductPage']);
Route::get('/restoreProduct', [ViewController::class, 'restoreProductPage']);
Route::post('updateProductStatus', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');

Route::get('/updateProduct', [ViewController::class, 'updateProductPage']);
Route::post('updateProductDetails', [ProductController::class, 'updateProductDetails'])->name('updateProductDetails');
