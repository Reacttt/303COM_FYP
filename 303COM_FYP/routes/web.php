<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

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

Route::get('/register', [ViewController::class, 'homePage']);
Route::get('/register', [ViewController::class, 'registerPage']);
Route::get('/login', [ViewController::class, 'loginPage']);

Route::post('registerUser', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('loginUser', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');
