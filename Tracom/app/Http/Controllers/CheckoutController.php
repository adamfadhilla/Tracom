<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class CheckoutController extends Controller
{
    public function index($menu) {
        return view('checkout', compact('menu'));
    }

    public function uploadBukti(Request $request) {
        $request->validate([
            'nama' => 'required',
            'menu' => 'required',
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('bukti')->store('bukti', 'public');

        Pembayaran::create([
            'nama' => $request->nama,
            'menu' => $request->menu,
            'bukti' => $path
        ]);

        return redirect()->route('sukses');
    }

    public function sukses() {
        return view('sukses');
    }
}

