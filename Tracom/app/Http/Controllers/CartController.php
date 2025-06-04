<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('keranjang', compact('cart'));
    }

    public function add(Request $request)
    {
        $item = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'qty' => $request->qty ?? 1
        ];

        $cart = session()->get('cart', []);
        $cart[] = $item;
        session()->put('cart', $cart);

        return redirect()->route('keranjang')->with('success', 'Item berhasil ditambahkan!');
    }
}
