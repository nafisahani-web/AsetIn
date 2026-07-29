<?php

use Illuminate\Support\Facades\Route;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Location;

use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard', [
    'totalAsset' => Asset::count(),
    'assetAktif' => Asset::where('status','Aktif')->count(),
    'assetMaintenance' => Asset::where('status','Maintenance')->count(),
    'assetRusak' => Asset::where('status','Rusak')->count(),
    'assetDipinjam' => Asset::where('status','Dipinjam')->count(),

    'totalCategory' => Category::count(),
    'totalSupplier' => Supplier::count(),
    'totalLocation' => Location::count(),

    'latestAssets' => Asset::with('location')
        ->latest()
        ->take(5)
        ->get(),
]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('document', DocumentController::class);

    // Report
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/pdf', [ReportController::class, 'exportPdf'])->name('report.pdf');
    Route::get('/report/excel', [ReportController::class, 'exportExcel'])->name('report.excel');

    Route::resource('warranty', WarrantyController::class);
    Route::resource('asset', AssetController::class)
    ->middleware('admin');
    Route::resource('location', LocationController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('brand', BrandController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';