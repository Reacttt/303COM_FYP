<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShippingDetailsController;

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

// Default Router
Route::get('/', [ViewController::class, 'homePage']);

// Customer Routers

// Customer Account
Route::get('/register', [ViewController::class, 'registerUserPage']);
Route::get('/login', [ViewController::class, 'loginUserPage']);
Route::post('registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('loginUser', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');

// Customer Category
Route::get('/category', [ViewController::class, 'categoryPage']);

// Customer Product
Route::get('/product/{category_id?}', [ViewController::class, 'productPage']);
Route::get('/singleProduct/{product_id?}', [ViewController::class, 'singleProductPage']);

// Customer Cart
Route::get('/cart', [ViewController::class, 'cartPage']);
Route::get('addCart/{product_id?}/{user_username?}', [CartController::class, 'addCart']);
Route::get('updateCartQuantity/{user_id?}/{product_id?}/{quantity?}', [CartController::class, 'updateCartQuantity']);
Route::get('removeCart/{user_id?}/{product_id?}', [CartController::class, 'removeCart']);
Route::get('checkout', [ViewController::class, 'checkoutPage']);

// Customer Shipping
Route::get('/shippingDetails', [ViewController::class, 'shippingDetailsPage']);
Route::get('removeShippingDetails/{shipping_details_id?}', [ShippingDetailsController::class, 'removeShippingDetails']);

// Customer Order
Route::get('placeOrder/{user_id?}', [OrderController::class, 'placeOrder']);
Route::get('viewOrder/{order_id?}', [ViewController::class, 'viewOrderPage']);

// Customer Order
Route::get('order', [ViewController::class, 'orderPage']);

// Admin Routers

// Admin Account
Route::post('loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('logoutAdmin', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');

// Admin Dashboard
Route::get('/admin', [ViewController::class, 'adminPage']);

// Admin Manage Category
Route::get('/addCategory', [ViewController::class, 'addCategoryPage']);
Route::post('addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::get('/updateCategory', [ViewController::class, 'updateCategoryPage']);
Route::get('findCategory/{category_id?}', [CategoryController::class, 'findCategory'])->name('findCategory');
Route::post('updateCategoryDetails', [CategoryController::class, 'updateCategoryDetails'])->name('updateCategoryDetails');
Route::get('/deleteCategory', [ViewController::class, 'deleteCategoryPage']);
Route::get('/restoreCategory', [ViewController::class, 'restoreCategoryPage']);
Route::get('updateCategoryStatus/{category_id?}/{category_status?}', [CategoryController::class, 'updateCategoryStatus'])->name('updateCategoryStatus');

// Admin Manage Product
Route::get('/addProduct', [ViewController::class, 'addProductPage']);
Route::post('addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::post('findProduct', [ProductController::class, 'findProduct'])->name('findProduct');
Route::get('/updateProduct', [ViewController::class, 'updateProductPage']);
Route::post('updateProductDetails', [ProductController::class, 'updateProductDetails'])->name('updateProductDetails');
Route::get('updateStock', [ViewController::class, 'updateStockPage']);
Route::get('updateProductStock/{product_id?}/{product_stock?}/{quantity?}', [ProductController::class, 'updateProductStock'])->name('updateProductStock');
Route::get('/deleteProduct', [ViewController::class, 'deleteProductPage']);
Route::get('/restoreProduct', [ViewController::class, 'restoreProductPage']);
Route::post('updateProductStatus', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');

