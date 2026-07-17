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
use App\Http\Controllers\PublicRegisterController;
use App\Http\Controllers\KaderController;


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/balita/{id}/grafik', [BalitaController::class, 'grafik'])->name('balita.grafik');


// ── Login & Logout ──────────────────────────────────────────────
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── Register Balita (publik, tanpa akun) ────────────────────────
Route::get('/register',  [PublicRegisterController::class, 'show'])->name('register');
Route::post('/register', [PublicRegisterController::class, 'store'])->name('register.store');

// ── Register Kader (bikin akun login) ───────────────────────────
Route::get('/register-kader',  [AuthController::class, 'showRegisterKader'])->name('register.kader');
Route::post('/register-kader', [AuthController::class, 'registerKader'])->name('register.kader.store');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

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
    Route::resource('edukasi', EdukasiController::class)->except(['show']);

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])->name('laporan.pdf');

    // Kelola Kader
    Route::get('/kelola-user', [KaderController::class, 'index'])->name('kader.index');
    Route::post('/kelola-user', [KaderController::class, 'store'])->name('kader.store');
    Route::delete('/kelola-user/{id}', [KaderController::class, 'destroy'])->name('kader.destroy');

    // Pengaturan
    Route::get('/pengaturan', [ProfileController::class, 'show'])->name('pengaturan.index');
    Route::put('/pengaturan', [ProfileController::class, 'update'])->name('pengaturan.update');
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