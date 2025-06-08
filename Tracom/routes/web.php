<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KasirAuthController;
use App\Http\Controllers\CartController;

// =======================
// Halaman Utama & Menu
// =======================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

// =======================
// Keranjang
// =======================
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'get'])->name('cart.get'); // (Opsional, jika digunakan Ajax)
Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
Route::put('/cart/update/{index}', [CartController::class, 'update'])->name('cart.update'); // ✅ Update item qty

// =======================
// Checkout
// =======================

Route::get('/checkout', function () {
    return view('checkout'); // Tampilkan halaman checkout (view checkout.blade.php)
})->name('checkout.form');

Route::get('/checkout', [CheckoutController::class, 'form'])->name('checkout.form');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');


Route::get('/admin/kasir', [KasirController::class, 'index'])->name('kasir.dashboard');
Route::post('/admin/kasir/verifikasi/{id}', [KasirController::class, 'verifikasi'])->name('kasir.verifikasi');
Route::post('/admin/kasir/update-status/{id}', [KasirController::class, 'updateStatus'])->name('kasir.updateStatus');

// halaman login kasir (bebas akses)
Route::get('kasir/login', [KasirAuthController::class, 'showLoginForm'])->name('kasir.login');
Route::post('kasir/login', [KasirAuthController::class, 'login'])->name('kasir.login.submit');

// group middleware auth guard kasir
Route::middleware('auth:kasir')->group(function () {
    Route::get('admin/kasir', [KasirAuthController::class, 'dashboard'])->name('kasir.dashboard');
    Route::post('kasir/logout', [KasirAuthController::class, 'logout'])->name('kasir.logout');
});
