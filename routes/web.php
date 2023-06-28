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



Route::get('/login', [LoginController::class, 'create']
)->name('login');
Route::post('/login', [LoginController::class, 'store']
);
Route::get('/logout', [LoginController::class, 'logout']
)->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']
    )->name('admin/dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard']
    )->name('admin');
    Route::resource('tenant-management', TenantController::class
    )->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::redirect('/admin', '/tenant-management');

//    Route::post('admin/tenant/store', [TenantController::class,'store']
//    )->name('tenant/store');
//    Route::get('admin/tenant/store', [TenantController::class,'create']
//    )->name('tenant/create');
//    Route::get('admin/tenant/index', [TenantController::class,'index']
//    )->name('tenant/index');

});


