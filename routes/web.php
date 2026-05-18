<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WaterUsageController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ExpertController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    
    // Water Usage routes
    Route::get('/usages/create', [WaterUsageController::class, 'create'])->name('usages.create');
    Route::post('/usages', [WaterUsageController::class, 'store'])->name('usages.store');

    // Service Provider routes
    Route::get('/provider/dashboard', [ServiceProviderController::class, 'index'])->name('provider.dashboard');
    Route::get('/provider/services/create', [ServiceProviderController::class, 'create'])->name('provider.services.create');
    Route::post('/provider/services', [ServiceProviderController::class, 'store'])->name('provider.services.store');
    Route::delete('/provider/services/{service}', [ServiceProviderController::class, 'destroy'])->name('provider.services.destroy');
    Route::get('/services-catalog', [ServiceProviderController::class, 'catalog'])->name('services.catalog');

    // Expert routes
    Route::get('/expert/dashboard', [ExpertController::class, 'index'])->name('expert.dashboard');
    Route::get('/expert/tips/create', [ExpertController::class, 'create'])->name('expert.tips.create');
    Route::post('/expert/tips', [ExpertController::class, 'store'])->name('expert.tips.store');
    Route::delete('/expert/tips/{tip}', [ExpertController::class, 'destroy'])->name('expert.tips.destroy');
    
    // Admin routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/users/{user}/validate', [AdminController::class, 'validateUser'])->name('admin.users.validate');
    Route::delete('/admin/tips/{tip}', [AdminController::class, 'destroyTip'])->name('admin.tips.destroy');
    Route::post('/goals', [App\Http\Controllers\GoalController::class, 'store'])->name('goals.store');
Route::delete('/admin/services/{service}', [App\Http\Controllers\AdminController::class, 'destroyService'])->name('admin.services.destroy');
    // Existing admin routes remain below
});

require __DIR__.'/auth.php';
