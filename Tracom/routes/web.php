<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/checkout/{menu}', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'uploadBukti'])->name('checkout.kirim');
Route::get('/sukses', [CheckoutController::class, 'sukses'])->name('sukses');

