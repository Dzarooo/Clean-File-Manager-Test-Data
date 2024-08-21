<?php

declare(strict_types=1);

use App\Modules\Image\ImageController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Image'], function () {

    Route::post('/image/file', [ImageController::class, 'storeFile'])->name('image.store.file');

    Route::post('/image/directory', [ImageController::class, 'storeDirectory'])->name('image.store.directory');

});
