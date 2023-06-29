<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route yang digunakan untuk mendapatkan halaman login
Route::get('/login', [LoginController::class, 'create']
)->name('login');
// Route yang digunakan untuk memroses login
Route::post('/login', [LoginController::class, 'store']
);
// Route yang digunakan untuk logout
Route::get('/logout', [LoginController::class, 'logout']
)->name('logout');

// Root route yang akan mengarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * Daftar route yang dibatasi oleh middleware auth:admin.
 * Hanya user yang sudah login dengan guard admin yang dapat mengakses route ini.
 */
Route::middleware(['auth:admin'])->group(function () {
    // Sekumpulan route untuk model tenant yang menggunakan TenantController
    Route::resource('tenant', TenantController::class
    )->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    // Route yang digunakan untuk menampilkan tenant spesifik
    Route::get('show', [TenantController::class, 'show']
    )->name('tenant/show');
    // Route untuk mencari tenant
    Route::get('search', [TenantController::class, 'search']
    )->name('tenant/search');

});


