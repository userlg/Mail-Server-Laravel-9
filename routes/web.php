<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;


Route::post('/', [MessageController::class, 'sendEmail'])->middleware('guest')->name('email.form');

Route::get('/', [MessageController::class, 'index'])->middleware('guest')->name('home');

Route::post('/confirm', [MessageController::class, 'confirmCode'])->middleware('guest')->name('confirm.code');
