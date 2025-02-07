<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->controller(AuthController::class)->group(function () {
    Route::get('/me', 'me');
    Route::post('/logout', 'logout');
});
