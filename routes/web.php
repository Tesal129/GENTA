<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;


Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // ... route lain yang udah ada

    // Balita
    Route::resource('balita', BalitaController::class);

    // Pemeriksaan
    Route::resource('pemeriksaan', PemeriksaanController::class);

    // Jadwal
    Route::get('/jadwal',           [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create',    [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal',          [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}',      [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}',   [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    // Edukasi
    Route::get('/edukasi', [EdukasiController::class, 'index'])->name('edukasi.index');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    // Profil
    Route::get('/profile',        [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});

Route::get('/fitur/data-balita', function () {
    return view('fitur.data-balita');
})->name('fitur.data-balita');

Route::get('/fitur/grafik-pertumbuhan', function () {
    return view('fitur.grafik-pertumbuhan');
})->name('fitur.grafik-pertumbuhan');

Route::get('/fitur/jadwal-pengingat', function () {
    return view('fitur.jadwal-pengingat');
})->name('fitur.jadwal-pengingat');

Route::get('/fitur/pemeriksaan-digital', function () {
    return view('fitur.pemeriksaan-digital');
})->name('fitur.pemeriksaan-digital');

Route::get('/fitur/laporan-statistik', function () {
    return view('fitur.laporan-statistik');
})->name('fitur.laporan-statistik');

Route::get('/fitur/konten-edukasi', function () {
    return view('fitur.konten-edukasi');
})->name('fitur.konten-edukasi');