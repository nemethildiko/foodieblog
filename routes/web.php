<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtelController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
// ----------------------------------------------------------
// AUTENTIKÁCIÓS RÉSZ – KÉSZÍTETTE: Németh Ildikó
// Feladat: user/admin szerepkörök kezelése
// ----------------------------------------------------------

// 🏠 Főoldal
Route::get('/', function () {
    return view('home');
})->name('home');

// 📊 Dashboard (auth + verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Profil műveletek (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Admin felület – csak admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// 🍲 Ételek
Route::get('/etelek', [EtelController::class, 'index'])->name('etelek.index');

// 📬 Kapcsolat
Route::get('/kapcsolat', [KapcsolatController::class, 'index'])->name('kapcsolat');
Route::post('/kapcsolat', [KapcsolatController::class, 'store'])->name('kapcsolat.store');

// 💬 Üzenetek – csak bejelentkezett user
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index');
    Route::post('/uzenetek', [UzenetController::class, 'store'])->name('uzenetek.store');
});

// 📈 Diagram
Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');

// 🛠️ CRUD példa

    Route::get('/crud', [CrudController::class, 'index'])->name('crud.index');
    Route::get('/crud/create', [CrudController::class, 'create'])->name('crud.create');
    Route::post('/crud', [CrudController::class, 'store'])->name('crud.store');
    Route::get('/crud/{etel}/edit', [CrudController::class, 'edit'])->name('crud.edit');
    Route::put('/crud/{etel}', [CrudController::class, 'update'])->name('crud.update');
    Route::delete('/crud/{etel}', [CrudController::class, 'destroy'])->name('crud.destroy');

require __DIR__.'/auth.php';
