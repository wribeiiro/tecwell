<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// All products
Route::get('/', [ProductController::class, 'index'])->name('/');

// Show Create Form
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create');

// Store Product Data
Route::post('/products', [ProductController::class, 'store'])->middleware('auth')->name('products.store');

// Show Edit Form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');

// Update product
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth')->name('products.update');

// Delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy');

// Manage products
Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth')->name('products.manage');

// Single product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('users.register');

// Create New User
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('users.logout');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('users.login');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');
