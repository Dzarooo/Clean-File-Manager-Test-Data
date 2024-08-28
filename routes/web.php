<?php

declare(strict_types=1);

use App\Models\User;
use App\Modules\File\DeleteFileController;
use App\Modules\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show']);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/forceLogin', function () {
    Auth::login(User::first());
    session()->regenerate();

    return redirect()->back();
})->name('forceLogin');

Route::post('/logout', function () {
    Auth::logout();
    session()->regenerate();

    return redirect()->back();
})->name('logout');

Route::post('/file/delete/{id}', [DeleteFileController::class, 'deleteFile'])->name('file.delete');

Route::get('/test', function () {
    return view('test');
});
