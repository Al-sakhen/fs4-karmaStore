<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Payments\PaypalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Home Routes
Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/category',[HomeController::class , 'category'])->name('category');
Route::get('/products/{id}' , [HomeController::class , 'products'])->name('products.show');
// cart routes
Route::get('/cart' , [CartController::class , 'index'])->name('cart.index');
Route::post('/cart/add/{id}' , [CartController::class , 'add'])->name('cart.add');


Route::get('signin' , [HomeController::class , 'signin'])->name('signin');
Route::get('signup' , [HomeController::class , 'signup'])->name('signup');

Route::get('checkout/{order}' , [CheckoutController::class , 'index'])->name('checkout');
Route::post('order/store' , [OrderController::class , 'store'])->name('order.store');

// Paypal routes
Route::get('paypal/create/{order}' , [PaypalController::class , 'create'])->name('paypal.create');
Route::get('paypal/cancel/{order}' , [PaypalController::class , 'cancel'])->name('paypal.cancel');
Route::get('paypal/return/{order}' , [PaypalController::class , 'callback'])->name('paypal.return');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__.'/dashboard.php';
