<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function menu() {
        return view('menu');
    }

    public function tentang() {
        return view('tentang');
    }    
    
}
