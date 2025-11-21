<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Beranda::class, 'index'])->name('beranda');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);
    });
});

Route::get('/datadiri', [App\Http\Controllers\DataDiri::class, 'index'])->name('datadiri');

Route::resource('/aktivitas', App\Http\Controllers\AktivitasController::class)->names([
    'index' => 'aktivitas',
    'create' => 'aktivitas.create',
    'store' => 'aktivitas.store',
    'edit' => 'aktivitas.edit',
    'update' => 'aktivitas.update',
    'destroy' => 'aktivitas.destroy',
]);

Route::get('/kontak', [App\Http\Controllers\Kontak::class, 'index'])->name('kontak');
Route::post('/kontak/kirim', [App\Http\Controllers\Kontak::class, 'kirim'])->name('kontak.kirim');