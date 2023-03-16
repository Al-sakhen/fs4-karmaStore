<?php


// Dashboard Routes

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth' , 'isAdmin'])->prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    // Categories routes
    Route::resource('categories' , CategoryController::class);
});





?>
