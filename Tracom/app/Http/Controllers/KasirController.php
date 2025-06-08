<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class KasirController extends Controller
{
    // Menampilkan semua pesanan ke dashboard kasir
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        // dd($orders); // hapus ini setelah yakin data sudah benar
        return view('admin.kasir', compact('orders'));
    }

    // Mengupdate status pesanan (pending/sukses/ditolak)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,sukses,ditolak',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('kasir.dashboard')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
