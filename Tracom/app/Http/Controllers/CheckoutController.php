<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{

    public function form()
{
    return view('checkout'); // atau nama view yang kamu gunakan untuk checkout
}
    
public function process(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'cart_data' => 'required|json',
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
    ]);

    $items = json_decode($request->cart_data, true);
    if (!is_array($items)) {
        return back()->withErrors(['cart_data' => 'Data keranjang tidak valid.']);
    }

    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Simpan file bukti pembayaran
    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('bukti_pembayaran', $filename, 'public');
    } else {
        $path = null;
    }

    $order = Order::create([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'metode' => $request->metode ?? 'qris',
        'cart' => json_encode($items),
        'total' => $total,
        'status' => 'pending',
        'bukti_pembayaran' => $path,
    ]);

     return redirect()->route('checkout.form')->with('success', 'Checkout berhasil! Silakan lanjut pembayaran.');

    }

    // Halaman sukses setelah checkout
    public function success()
    {
        return view('checkout.success');
    }
}
