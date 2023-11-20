<?php

use Smile\Bank\Http\Controllers\CustomerController;

Route::group([

    'prefix' => 'api'

], function () {
    Route::resource('/customers', CustomerController::class);
});
