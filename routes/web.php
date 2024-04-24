<?php

use App\Http\Controllers\AuthController;
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

// views section
Route::view('/auth/login', 'auth.login')
    ->name('page.login');
// Route::view('/auth/register', 'auth.register')
//     ->name('page.register');

Route::view('/', 'index')
    ->name('page.index');
Route::view('/spareparts', 'spareparts')
    ->name('page.spareparts');

// ==== Admin ====
Route::view('admin/dashboard', 'admin.dashboard')
    ->name('page.admin.dashboard');
Route::view('admin/spareparts', 'admin.spareparts')
    ->name('page.admin.spareparts');
Route::view('admin/categories', 'admin.categories')
    ->name('page.admin.categories');
Route::view('admin/customer', 'admin.customer')
    ->name('page.admin.customer');
Route::view('admin/transaction', 'admin.transaction')
    ->name('page.admin.transaction');
// end views section

// auth section
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
// end auth section
