<?php

use Illuminate\Support\Facades\Route;

use Smile\Bank\Http\Controllers\CustomerController;
use Smile\Bank\Http\Controllers\AccountController;

Route::group([

    'prefix'     => 'api',
    'middleware' => 'api',

], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('accounts', AccountController::class);

    Route::post('accounts/balance', [AccountController::class, 'getBalance']);
    Route::post('accounts/transfer_history', [AccountController::class, 'getTransferHistory']);

});
