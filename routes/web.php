<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Burada web rotalarını tanımlarsın. Tüm rotalar 'web' middleware grubundadır.
| Bu dosya RouteServiceProvider tarafından otomatik yüklenir.
|
*/

// Anasayfa (/) erişildiğinde kullanıcı login sayfasına yönlendirilir.
Route::get('/', function () {
    return redirect()->route('login');
});

// Admin dashboard rotası (URL: /admin-dashboard)
Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// User dashboard rotası (URL: /user-dashboard)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Profil işlemleri (sadece giriş yapmış kullanıcılar erişebilir)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel'in hazır auth rotaları (login, logout, register vs)
require __DIR__.'/auth.php';
