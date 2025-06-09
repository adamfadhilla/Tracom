<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class KasirController extends Controller
{
    public function index()
    {
        // Ambil semua order, decode cart JSON menjadi array
        $orders = Order::orderBy('created_at', 'desc')->get()->map(function($order) {
            $order->cart = json_decode($order->cart, true) ?: [];
            return $order;
        });

        return view('kasir.dashboard', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,sukses,ditolak',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Atur sesuai route login kamu
    }
}
