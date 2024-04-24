<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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
    ->name('page.login')
    ->middleware('guest');
// Route::view('/auth/register', 'auth.register')
//     ->name('page.register');

Route::view('/', 'index')
    ->name('page.index');
Route::view('/spareparts', 'spareparts')
    ->name('page.spareparts');

// ==== Admin ====
Route::view('admin/spareparts', 'admin.spareparts')
    ->name('page.admin.spareparts');
Route::view('admin/transaction', 'admin.transaction')
    ->name('page.admin.transaction');
// end views section

// auth section
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
// end auth section


Route::middleware('auth')->group(function () {
    Route::middleware('can:admin')->prefix('admin')->group(function (){
        Route::get('/dashboard', DashboardController::class)
            ->name('dashboard');
        Route::resource('categories', CategoryController::class)
            ->only(['index', 'store', 'destroy']);
        Route::resource('customers', CustomerController::class)
            ->except(['edit', 'create']);
    });
});