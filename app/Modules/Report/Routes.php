<?php

declare(strict_types=1);

use App\Modules\Report\ReportController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Report'], function () {

    Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');

});
