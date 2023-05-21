<?php

use App\Http\Controllers\TransbankController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/iniciar_compra', [TransbankController::class, 'iniciar_compra']);
Route::any('/confirmar_pago', [TransbankController::class, 'confirmar_pago'])->name('confirmar_pago');
