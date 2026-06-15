<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BeritaAcaraController as AdminBeritaAcaraController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\PengaturanController as AdminPengaturanController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/sertifikasi', [SertifikasiController::class, 'index'])->name('sertifikasi');
Route::get('/berita-acara', [BeritaAcaraController::class, 'index'])->name('berita.index');
Route::get('/berita-acara/{slug}', [BeritaAcaraController::class, 'show'])->name('berita.show');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'send'])->name('kontak.send');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Admin Settings (Change password, etc)
    Route::get('/profile-settings', [DashboardController::class, 'profileSettings'])->name('profile.settings');
    Route::put('/profile-settings', [DashboardController::class, 'updateProfileSettings'])->name('profile.settings.update');

    // Berita Acara CRUD
    Route::get('/berita-acara', [AdminBeritaAcaraController::class, 'index'])->name('berita.index');
    Route::get('/berita-acara/create', [AdminBeritaAcaraController::class, 'create'])->name('berita.create');
    Route::post('/berita-acara', [AdminBeritaAcaraController::class, 'store'])->name('berita.store');
    Route::get('/berita-acara/{id}/edit', [AdminBeritaAcaraController::class, 'edit'])->name('berita.edit');
    Route::put('/berita-acara/{id}', [AdminBeritaAcaraController::class, 'update'])->name('berita.update');
    Route::delete('/berita-acara/{id}', [AdminBeritaAcaraController::class, 'destroy'])->name('berita.destroy');
    Route::post('/berita-acara/{id}/toggle-home', [AdminBeritaAcaraController::class, 'toggleHome'])->name('berita.toggle-home');

    // LSP Content & Schemes Management
    Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');
    
    // Schemes (Sertifikasi) CRUD inside ProfilController
    Route::post('/sertifikasi', [AdminProfilController::class, 'storeSertifikasi'])->name('sertifikasi.store');
    Route::put('/sertifikasi/{id}', [AdminProfilController::class, 'updateSertifikasi'])->name('sertifikasi.update');
    Route::delete('/sertifikasi/{id}', [AdminProfilController::class, 'destroySertifikasi'])->name('sertifikasi.destroy');

    // Gallery Management
    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');

    // General Site & SEO Settings
    Route::get('/pengaturan', [AdminPengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('/pengaturan', [AdminPengaturanController::class, 'update'])->name('pengaturan.update');
});
