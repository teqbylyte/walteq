<?php

use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\WalletTransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::controller(WalletController::class)->prefix('wallets')->group(function () {
        Route::post('/create', 'store');
        Route::get('/{wallet}', 'show');
        Route::get('/{wallet}/balance', 'balance');
    });

    Route::resource('wallets.transactions', WalletTransactionController::class)->only('index');

    Route::controller(WalletTransactionController::class)->prefix('transactions')->group(function () {
        Route::post('/create', 'store');
        Route::post('/wallet-transfer', 'walletTransfer');
    });
});
