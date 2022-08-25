<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;


Route::post('/', [MessageController::class,'sendEmail']);

Route::get('/', [MessageController::class,'index'])->name('home');



