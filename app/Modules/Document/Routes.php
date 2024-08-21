<?php

declare(strict_types=1);

use App\Modules\Document\DocumentController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Document'], function () {

    Route::post('/document/file', [DocumentController::class, 'storeFile'])->name('document.store.file');

    Route::post('/document/directory', [DocumentController::class, 'storeDirectory'])->name('document.store.directory');

});
