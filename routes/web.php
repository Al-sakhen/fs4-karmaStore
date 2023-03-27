<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
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



// =========================
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__.'/dashboard.php';
