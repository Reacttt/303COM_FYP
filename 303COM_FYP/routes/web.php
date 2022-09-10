<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
Route::get('/product/{category_id?}', [ViewController::class, 'productPage']);
Route::get('/cart', [ViewController::class, 'cartPage']);

Route::post('registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('loginUser', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');

Route::get('addCart/{product_id?}/{user_username?}', [CartController::class, 'addCart'])->name('addCart');
Route::get('updateCartQuantity/{user_id?}/{product_id?}/{quantity?}', [CartController::class, 'updateCartQuantity'])->name('updateCartQuantity');

// Admin Routers

// Admin Dashboard
Route::get('/admin', [ViewController::class, 'adminPage']);

// Admin Category
Route::get('/addCategory', [ViewController::class, 'addCategoryPage']);
Route::post('addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');

// Admin Product
Route::get('/addProduct', [ViewController::class, 'addProductPage']);
Route::post('addProduct', [ProductController::class, 'addProduct'])->name('addProduct');

Route::post('findProduct', [ProductController::class, 'findProduct'])->name('findProduct');

Route::get('/deleteProduct', [ViewController::class, 'deleteProductPage']);
Route::get('/restoreProduct', [ViewController::class, 'restoreProductPage']);
Route::post('updateProductStatus', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');

Route::get('/updateProduct', [ViewController::class, 'updateProductPage']);
Route::post('updateProductDetails', [ProductController::class, 'updateProductDetails'])->name('updateProductDetails');

Route::get('updateStock', [ViewController::class, 'updateStockPage']);
Route::get('updateProductStock/{product_id?}/{product_stock?}/{quantity?}', [ProductController::class, 'updateProductStock'])->name('updateProductStock');
