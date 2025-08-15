<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Burada web rotalarını tanımlarsın. Tüm rotalar 'web' middleware grubundadır.
| Bu dosya RouteServiceProvider tarafından otomatik yüklenir.
|
*/

// 1. Anasayfa: root URL'den login sayfasına yönlendirme
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Admin panel rotaları (yetkisi olan kullanıcılar)
Route::middleware(['auth', 'verified', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Admin kullanıcı yönetimi CRUD
    Route::get('/users', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('user.create'); // Yeni kullanıcı formu
    Route::post('/users', [AdminUserController::class, 'store'])->name('user.store'); // Yeni kullanıcı kaydet
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('user.edit'); // Düzenleme formu
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('user.update'); // Güncelle
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('user.destroy'); // Sil
});

// 3. Kullanıcı panel rotaları
Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    // Kullanıcı dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// 4. Profil işlemleri (giriş yapmış tüm kullanıcılar için)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 5. Laravel Auth rotaları (login, register, password reset vb.)
require __DIR__.'/auth.php';
