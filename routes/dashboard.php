<?php


// Dashboard Routes

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth' , 'isAdmin'])->prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Categories routes
    Route::resource('categories' , CategoryController::class);
    // Products routes
    Route::resource('products' , ProductController::class);
});





?>
