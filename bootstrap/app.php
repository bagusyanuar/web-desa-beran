<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Buat instance aplikasi
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();

// Ganti public path di sini — cara aman Laravel 11
$customPublic = realpath(dirname(__DIR__) . '/..'); // 1 folder di atas project
if ($customPublic && is_dir($customPublic)) {
    $app->usePublicPath($customPublic);
}

return $app;
