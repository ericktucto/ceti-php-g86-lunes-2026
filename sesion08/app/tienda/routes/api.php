<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Jobs\ProcesarImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// api version 1
Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::post('/user/photo', function () {
        ProcesarImagen::dispatch(request('path'));
        
        return response()->json([
            "message" => "okay"
        ], 202);
    });
    Route::post('/orders/{id}/pay', function (PaymentService $payments, int $id) {
        $order = Order::find($id);
        if (!$order->key_idempotencia) {
            $order->update(['key_idempotencia' => Str::uuid7()]);
        }
        $checkout_url = $payments->createCheckout($order);
        return response()->json([
            "checkout_url" => $checkout_url
        ]);
    });
    Route::post('/payments/webhook', function() {
        $signature = request()->header('X-Signature'); // 500ms
        # 1. validar la firma
        # 2. verificar key de idempotencia
        # 3. obtener la informacion del pago desde tu pasarela de pagos(cliente http)
        # 4. obtener la orden
        # 5. verificar pago se completo
        # 6. guardar la orden con el estado de pagada

        return response()->json([
            'message' => 'Okay'
        ], 202);
    });
});

