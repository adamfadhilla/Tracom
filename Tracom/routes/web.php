<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;


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

Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/qris/{id}', [CheckoutController::class, 'showQRIS'])->name('checkout.qris');
Route::get('/checkout/success', function () {
    return view('checkout.success'); // Halaman sukses setelah checkout berhasil
})->name('checkout.success');