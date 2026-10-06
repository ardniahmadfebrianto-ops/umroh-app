<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Arahkan pengunjung langsung ke halaman login.
Route::redirect('/', '/login');

Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('dashboard');

// Kelola paket hanya tersedia untuk pengelola sistem.
Route::middleware(['auth', 'can:manage-packages'])->group(function () {
    Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.packages');
    Route::post('/admin/packages', [PackageController::class, 'store'])->name('admin.packages.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
