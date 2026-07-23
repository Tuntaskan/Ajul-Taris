<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanKerusakanController;
use App\Http\Controllers\PerbaikanController;


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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Guest
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'loginPage'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

// User yang sudah login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('barang', BarangController::class);

    Route::resource('kategori', KategoriBarangController::class);

    Route::put('/peminjaman/{peminjaman}/setujui', [PeminjamanController::class, 'setujui'])
        ->name('peminjaman.setujui');

    Route::put('/peminjaman/{peminjaman}/tolak', [PeminjamanController::class, 'tolak'])
        ->name('peminjaman.tolak');

    Route::put('/peminjaman/{peminjaman}/selesai', [PeminjamanController::class, 'selesai'])
        ->name('peminjaman.selesai');

});

Route::middleware('auth')->group(function () {

    Route::resource('peminjaman', PeminjamanController::class);

});

Route::middleware(['auth', 'superadmin'])->group(function () {

    Route::resource('user', UserController::class);

});

// Route::middleware('auth')->group(function () {

//     Route::resource('barang', BarangController::class);

//     Route::resource('kategori', KategoriBarangController::class);

// });

Route::middleware('auth')->group(function () {
    Route::resource('laporankerusakan', LaporanKerusakanController::class)
        ->except(['show']);
});

Route::middleware(['auth', 'teknisi'])->group(function () {
    Route::resource('perbaikan', PerbaikanController::class);
});