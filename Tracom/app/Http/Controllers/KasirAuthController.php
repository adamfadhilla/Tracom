<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
class KasirAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('kasir.login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'name' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::guard('kasir')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('kasir.dashboard'));
    }

    return back()->withErrors([
        'name' => 'Username atau password salah',
    ]);
}


    public function dashboard()
    {
        $orders = Order::latest()->get(); // atau Order::all();
    return view('admin.kasir', compact('orders')); // ✅
    }

    public function logout(Request $request)
    {
        Auth::guard('kasir')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('kasir.login');
    }
}
