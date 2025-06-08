<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'telepon', 'metode', 'cart',
        'total', 'status', 'bukti_pembayaran'
    ];

    protected $casts = [
    'cart' => 'array', // Ini membuat Laravel otomatis decode JSON ke array saat akses $order->cart
];  

}
