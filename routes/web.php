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
    'prefix' => 'user'
], static function () {
    Route::post('', [App\Http\Controllers\HomeController::class, 'store']);
    Route::group(['prefix' => '{id}'], static function () {
        Route::get('edit', [App\Http\Controllers\HomeController::class, 'show']);
        Route::put('', [App\Http\Controllers\HomeController::class, 'update']);
        Route::delete('', [App\Http\Controllers\HomeController::class, 'delete']);
    });
});
