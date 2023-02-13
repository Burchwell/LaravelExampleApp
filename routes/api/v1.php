<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
    ], static function () {
        Route::get('login', [AuthController::class, 'login']);
    });
