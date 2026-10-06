<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\JokeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JokeController::class, 'index']);
Route::resource('jokes', JokeController::class);

Route::get('/auth/register', [RegisteredUserController::class, 'create']);
Route::post('/auth/register', [RegisteredUserController::class, 'store']);
Route::get('/auth/login', [SessionsController::class, 'create']);
Route::post('/auth/login', [SessionsController::class, 'store']);
Route::delete('/auth/logout', [SessionsController::class, 'destroy']);

Route::view('/faq', 'faq');
