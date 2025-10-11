<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================
// 🔹 HALAMAN UTAMA (langsung ke user)
// =======================
Route::get('/', function () {
    return redirect()->route('user.home');
});

// =======================
// 🔹 ADMIN ROUTES
// =======================
Route::prefix('admin')->middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// =======================
// 🔹 USER ROUTES
// =======================
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('user.page.home.home');
    })->name('user.home');
});

// =======================
// 🔹 PROFILE ROUTES
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
