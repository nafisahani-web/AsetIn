<?php

use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('warranty', WarrantyController::class);
    Route::resource('asset', AssetController::class);
    Route::resource('location', LocationController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('brand', BrandController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
