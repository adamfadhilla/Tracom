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

// =======================
// Checkout
// =======================
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/kirim', [CheckoutController::class, 'uploadBukti'])->name('checkout.kirim');
Route::get('/checkout/sukses', [CheckoutController::class, 'sukses'])->name('sukses');
