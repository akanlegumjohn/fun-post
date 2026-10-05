<?php

use App\Http\Controllers\JokeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JokeController::class, 'index']);
Route::resource('jokes', JokeController::class);

Route::view('/faq', 'faq');
