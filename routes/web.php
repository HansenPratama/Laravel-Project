<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggotaaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/surats', [SuratController::class, 'index'])->name('surats.index');
Route::get('/surats/create', [SuratController::class, 'create'])->name('surats.create');
Route::post('/surats', [SuratController::class, 'store'])->name('surats.store');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita');
Route::resource('surats', SuratController::class);
Route::resource('/anggota', AnggotaController::class);
Route::resource('kas', KasController::class)->except(['show']);
Route::resource('users', UserController::class);
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/anggotaa/dashboard', [AnggotaaController::class, 'index'])->name('anggotaa.dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'anggota'])->prefix('anggota')->name('anggota.')->group(function () {
    Route::get('/anggotaa/dashboard', [AnggotaaController::class, 'index'])->name('anggotaa.dashboard');
});

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/berita', function () {
    return view('berita');
});



Route::get('/kas/download', [KasController::class, 'download'])->name('kas.download');