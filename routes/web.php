<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailSeminarController;

// landing page 
Route::get('/', [SeminarController::class, 'landingPage'])->name('landingPage');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/pageTiket/{id}', [DetailSeminarController::class, 'showDetail'])->name('pageTiket');

// Rute untuk menampilkan form checkout
Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Rute untuk memproses pembayaran dan redirect ke Midtrans
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// Rute untuk menangani callback dari Midtrans
// Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

// Rute untuk menangani notifikasi dari Midtrans
Route::get('/midtrans/notification', [CheckoutController::class, 'notificationHandler'])->name('midtrans.notification');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/home-dashboard', [DashboardController::class, 'index'])->name('home.dashboard');

// Rute untuk mengelola seminar
Route::get('/dashboard/seminar-management', [SeminarController::class, 'index'])->name('dashboard.seminarM');
Route::get('/seminars/create', [SeminarController::class, 'create'])->name('seminars.create');
Route::post('/seminars', [SeminarController::class, 'store'])->name('seminars.store');
Route::get('/seminars/{id}/edit', [SeminarController::class, 'edit'])->name('seminars.edit');
Route::put('/seminars/{id}', [SeminarController::class, 'update'])->name('seminars.update');
Route::delete('/seminars/{id}', [SeminarController::class, 'destroy'])->name('seminars.destroy');
Route::get('/seminars/{id}', [SeminarController::class, 'show'])->name('seminars.show');

Route::get('/dashboard/ticket-management', [TiketController::class, 'index'])->name('dashboard.ticketM');
Route::get('/dashboard/ticket-management/create', [TiketController::class, 'create'])->name('tickets.create');
Route::post('/dashboard/ticket-management', [TiketController::class, 'store'])->name('tickets.store');
Route::get('/dashboard/ticket-management/{id}/edit', [TiketController::class, 'edit'])->name('tickets.edit');
Route::put('/dashboard/ticket-management/{id}', [TiketController::class, 'update'])->name('tickets.update');
Route::delete('/dashboard/ticket-management/{id}', [TiketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/dashboard/pengguna', [UserController::class, 'index'])->name('dashboard.pengguna');
Route::get('/dashboard/pengguna/create', [UserController::class, 'create'])->name('dashboard.admins.create');
Route::post('/dashboard/pengguna', [UserController::class, 'store'])->name('dashboard.pengguna.store');
Route::get('/dashboard/pengguna/{user}/edit', [UserController::class, 'edit'])->name('dashboard.admins.edit');
Route::put('/dashboard/pengguna/{user}', [UserController::class, 'update'])->name('dashboard.pengguna.update');
Route::delete('/dashboard/pengguna/{user}', [UserController::class, 'destroy'])->name('dashboard.pengguna.destroy');

Route::get('/dashboard/reports', [ReportController::class, 'index'])->name('dashboard.reports');
Route::get('/dashboard/reports/{report}', [ReportController::class, 'show'])->name('dashboard.reports.show');
Route::get('/dashboard/reports/{report}/edit', [ReportController::class, 'edit'])->name('dashboard.reports.edit');
Route::put('/dashboard/reports/{report}', [ReportController::class, 'update'])->name('dashboard.reports.update');
Route::delete('/dashboard/reports/{report}', [ReportController::class, 'destroy'])->name('dashboard.reports.destroy');