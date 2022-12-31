<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;


Route::post('/', [MessageController::class, 'sendEmail'])->middleware('guest');

Route::get('/', [MessageController::class, 'index'])->middleware('guest')->name('home');
