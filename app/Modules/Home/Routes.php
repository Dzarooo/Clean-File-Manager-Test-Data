<?php

declare(strict_types=1);

use App\Modules\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Home'], function () {

    Route::get('/', [HomeController::class, 'show']);

});
