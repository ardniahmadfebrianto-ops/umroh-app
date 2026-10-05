<?php

use Illuminate\Support\Facades\Route;
use App\Models\Package;
use App\Livewire\Admin\ManagePackages;

// 1. Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. Dashboard (Menampilkan Paket untuk User)
Route::get('/dashboard', function () {
    return view('dashboard', [
        'packages' => Package::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Rute Khusus Admin (Untuk Input Paket)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/packages', ManagePackages::class)->name('admin.packages');
});

// 4. Rute Profile
Route::middleware('auth')->group(function () {
    Route::view('profile', 'profile')->name('profile');
});

// WAJIB ADA: Memanggil file auth.php bawaan Breeze
require __DIR__.'/auth.php';