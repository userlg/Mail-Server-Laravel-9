<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;



Route::get('/', [MessageController::class,'index'])->name('home');


Route::post('/', [MessageController::class,'sendEmail']);
