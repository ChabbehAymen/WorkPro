<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::middleware('auth')->group( function () {
    Route::view('/main', 'main')->name('main');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
