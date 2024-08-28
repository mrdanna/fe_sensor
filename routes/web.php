<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::middleware(['ensureTokenIsValid'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     // Routes CRUD lainnya
// });

Route::get('/admin/data', [DataController::class, 'index'])->name('data');
Route::get('/admin/data/add', [DataController::class, 'add'])->name('data_add');
Route::post('/admin/data/add/action', [DataController::class, 'add_action'])->name('data_add_action');
Route::get('admin/data/edit/{id}', [DataController::class, 'edit'])->name('data_edit');
Route::put('admin/data/update/{id}', [DataController::class, 'update'])->name('data_update');
Route::delete('admin/data/delete/{id}', [DataController::class, 'delete'])->name('data_delete');
