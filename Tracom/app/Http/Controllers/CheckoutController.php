<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('keranjang')->with('error', 'Keranjang Anda kosong.');
        }

        return view('checkout', compact('cart'));
    }

    public function uploadBukti(Request $request) {
        $request->validate([
            'nama' => 'required',
            'menu' => 'required',
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data keranjang dari session
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('keranjang')->with('error', 'Keranjang Anda kosong.');
        }

        // Simpan gambar bukti ke storage publik
        $buktiPath = $request->file('bukti')->store('bukti-pembayaran', 'public');

        // Simpan setiap item ke database
        foreach ($cart as $item) {
            Pembayaran::create([
                'nama'  => $validated['nama'],
                'menu'  => $item['nama'],
                'qty'   => $item['qty'],
                'harga' => $item['harga'],
                'bukti' => $buktiPath,
            ]);
        }

        // Bersihkan keranjang dari session
        session()->forget('cart');

        return redirect()->route('sukses')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

    // Menampilkan halaman sukses
    public function sukses()
    {
        return view('sukses');
    }
}
