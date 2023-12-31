<?php
namespace App\Http\Controllers\Sample;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HelloController::class)->prefix('hello')->name('hello.')->group(function () {
    Route::get('/{id?}', 'index')->name('index');
    Route::post('', 'index');
    Route::get('/other', 'other')->name('other');
});

Route::namespace('Sample')->prefix('sample')->group(function () {
    Route::get('', [SampleController::class, 'index'])->name('sample');
    Route::get('/other', [SampleController::class, 'other']);
});
