<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
   public function process(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'cart_data' => 'required|json',
    ]);

    $items = json_decode($request->cart_data, true);

    // Hitung total harga
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $order = Order::create([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'metode' => $request->metode ?? 'qris',
        'cart' => json_encode($items),
        'total' => $total,
        'status' => 'pending',
    ]);

    return redirect()->route('checkout.qris', ['id' => $order->id]);
}


    public function showQRIS($id)
    {
        $order = Order::findOrFail($id);
        return view('checkout.qris', compact('order'));
    }
}
