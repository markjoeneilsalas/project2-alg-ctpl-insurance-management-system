<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile');
Route::patch('/admin', [ProfileController::class, 'update'])->name('admin.update');
Route::delete('/admin', [ProfileController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/index', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');


require __DIR__.'/auth.php';
