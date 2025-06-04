<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
       

        return view('keranjang'); // tampilkan view resources/views/keranjang.blade.php
    }
}
