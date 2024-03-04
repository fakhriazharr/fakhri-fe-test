<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;

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

Route::get('/dashboard', [BarangController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [BarangController::class,'index'])->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::get('barang',[BarangController::class,'index']);

Route::get('/pengajuan',[PengajuanController::class,'index'])->name('pengajuan.index');
// Route::post('/pengajuan-create',[PengajuanController::class,'store'])->name('pengajuan-create');
Route::post('/pengajuan',[PengajuanController::class,'store'])->name('pengajuan.store');

require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';