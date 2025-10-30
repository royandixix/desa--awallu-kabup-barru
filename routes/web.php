<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================
// 🔹 HALAMAN UTAMA → langsung tampil halaman user tanpa login
// =======================
Route::get('/', function () {
    return view('user.page.home.conten'); // langsung ke home
})->name('user.home');

// =======================
// 🔹 ADMIN ROUTES (masih butuh login & verified)
// =======================
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::get('/user/profil', function () {
    return view('user.page.profil_desa.profil_desa');
})->name('user.profil');


// =======================
// 🔹 PROFILE ROUTES (untuk user login saja)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
