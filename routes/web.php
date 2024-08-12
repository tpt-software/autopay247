<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\InstructController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\StaticController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::post('/verify-bank-number',[HomeController::class, 'verifyBankNumber'])->name('verify_bank_number');
Route::get('verify', [HomeController::class, 'banks'])->name('verify');
Route::post('get-qr-code', [HomeController::class, 'getQrCode'])->name('get_qr_code');
Route::get('/prices', [HomeController::class, 'prices'])->name('prices');
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('instruct', [InstructController::class, '__invoke'])->name('instruct');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('insurance', [TransactionController::class, 'insurance'])->name('insurance');

// Bán tiền mã hóa
Route::get('sell', [TransactionController::class, 'sell'])->name('sell');
// Mua tiền mã hóa
Route::get('buy', [TransactionController::class, 'buy'])->name('buy');

Route::get('transaction', [TransactionController::class, 'transaction'])->name('transaction');
Route::get('transfer', [TransactionController::class, 'transfer'])->name('transfer');
Route::get('handle-verify/{uuid}/{status?}', [TransactionController::class, 'handleVerify'])->name('handle-verify');
Route::get('verify-cccd', [TransactionController::class, 'verifyCccd'])->name('verify-cccd');
Route::post('verify-otp', [TransactionController::class, 'verifyOtp'])->name('verify-otp');
Route::get('check-send-otp', [TransactionController::class, 'checkSendOtp'])->name('check-send-otp');
Route::post('check-banking', [TransactionController::class, 'checkBanking'])->name('check-banking');

Route::post('transfer-buy/{uuid}', [TransferController::class, 'buy'])->name('transfer.buy');
Route::get('transfer-handle-buy/{uuid}/{status?}', [TransferController::class, 'handleBuy'])->name('transfer.handle-buy');
Route::get('transfer-sell/{uuid?}', [TransferController::class, 'Viewsell'])->name('transfer.sell');
Route::post('transfer-sell/{uuid?}', [TransferController::class, 'sell'])->name('transfer.sell');
Route::get('/get-random-history', [TransferController::class, 'getRandomHistoryData']);
Route::post('/kyc-cccd', [TransferController::class, 'kycCccd'])->name('kyc-cccd');

Route::post('/store', [OrderController::class, 'store'])->name('admin.order.store');
Route::get('/success', [OrderController::class, 'success'])->name('admin.order.success');
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('coin', CoinController::class);
        Route::prefix('verify')->name('verify.')->group(function () {
            Route::get('/', [VerifyController::class, 'index'])->name('index');
            Route::get('/transaction/{id?}', [VerifyController::class, 'transaction'])->name('transaction');
            Route::post('/message/{verify_id}', [VerifyController::class, 'message'])->name('message');
            Route::post('/UpdateInfoVerify', [VerifyController::class, 'UpdateInfoVerify'])->name('UpdateInfoVerify');
            Route::get('/show/{id}', [VerifyController::class, 'show'])->name('show');
            Route::post('/activeStatus/{id}', [VerifyController::class, 'activeStatus'])->name('activeStatus');
        });
        Route::prefix('order')->name('order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/{id}', [OrderController::class, 'show'])->name('show');
            Route::get('/Verification/{id}', [OrderController::class, 'verification'])->name('verification');
            Route::post('/active/{id}', [OrderController::class, 'active'])->name('active');

        });
        Route::prefix('transaction')->name('transaction.')->group(function () {
            Route::get('/', [AdminTransactionController::class, 'index'])->name('index');
            Route::post('/{id}/update-status', [AdminTransactionController::class, 'updateStatus'])->name('update_status');
            Route::post('/{id}/invalid', [AdminTransactionController::class, 'invalid'])->name('invalid');
            Route::post('/{id}/accept-send-coin', [AdminTransactionController::class, 'acceptSendCoin'])->name('accept_send_coin');
        });
        Route::get('/transaction/{id?}', [AdminTransactionController::class, 'show'])->name('transaction.show');

        Route::prefix('static')->name('static.')->group(function () {
            Route::get('/', [StaticController::class, 'index'])->name('index');
        });
    });
});
 
require __DIR__.'/auth.php';
