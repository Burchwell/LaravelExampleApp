<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([
    'middleware' => 'auth',
    'prefix' => 'home'
], static function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'users'
], static function () {
    Route::get('', [App\Http\Controllers\UsersController::class, 'create']);
    Route::post('', [App\Http\Controllers\UsersController::class, 'store']);
    Route::group(['prefix' => '{id}'], static function () {
        Route::get('', [App\Http\Controllers\UsersController::class, 'show']);
        Route::get('edit', [App\Http\Controllers\UsersController::class, 'edit']);
        Route::put('', [App\Http\Controllers\UsersController::class, 'update']);
        Route::delete('', [App\Http\Controllers\UsersController::class, 'destroy']);
    });
});
