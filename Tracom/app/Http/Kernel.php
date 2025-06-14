<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
         'auth' => \App\Http\Middleware\Authenticate::class,
    'kasir.auth' => \App\Http\Middleware\AuthKasir::class, // <-- Tambahkan ini
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // ...
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'kasir.auth' => \App\Http\Middleware\AuthKasir::class, // Tambahkan ini
        // lainnya...
    ];
}
