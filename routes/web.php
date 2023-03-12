<?php

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
Route::get('/', function () {
    return view('front.index');
});
Route::get('/category', function () {
    return view('front.category');
})->name('category');

Route::get('signin' , [HomeController::class , 'signin'])->name('signin');
Route::get('signup' , [HomeController::class , 'signup'])->name('signup');


// Dashboard Routes
Route::middleware(['auth' , 'isAdmin'])->prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
});

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
