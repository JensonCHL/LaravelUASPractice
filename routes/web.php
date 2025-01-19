<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'is_adm'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/purchase/{product}', [PurchaseController::class, 'purchase'])->name('purchase');
});

Route::middleware(['auth', 'is_Admin'])->group(function () {
    Route::get('/editstock', [AdminController::class, 'index'])->name('editStock');
    Route::get('/admin/products/add', [AdminController::class, 'create'])->name('admin.products.create'); // Add product form
    Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
});


require __DIR__ . '/auth.php';
