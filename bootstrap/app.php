<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

// Buat instance aplikasi
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 404,
                    'message' => 'route not found',
                    'data' => null,
                    'meta' => null
                ], 404);
            }
        });

        $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
            if ($request->is('api/*')) {
                return true;
            }

            return $request->expectsJson();
        });

        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => $e->getCode() ?: 500,
                    'message' => $e->getMessage() ?: 'An unexpected error occurred.',
                    'data' => null,
                    'meta' => [
                        'route' => $request->path(),
                    ],
                ], $e->getCode() ?: 500);
            }
        });
    })
    ->create();

// Ganti public path di sini — cara aman Laravel 11
// $customPublic = realpath(dirname(__DIR__) . '/..'); // 1 folder di atas project
// if ($customPublic && is_dir($customPublic)) {
//     $app->usePublicPath($customPublic);
// }

return $app;
