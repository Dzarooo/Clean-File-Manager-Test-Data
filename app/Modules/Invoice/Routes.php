<?php

declare(strict_types=1);

use App\Modules\Invoice\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Invoice'], function () {

    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');

});
