<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
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
Route::post('/api/token_generate', [AuthController::class, 'tokenGenerate'])->name('token_generate');
#vietqr_@#_password
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/bank/api/transaction-sync', [TransactionController::class, 'transactionSync'])->name('transaction_sync');
});