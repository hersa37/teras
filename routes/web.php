<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'create']
)->name('login');
Route::post('/login', [LoginController::class, 'store']
);
Route::get('/logout', [LoginController::class, 'logout']
)->name('logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin/dashboard');


