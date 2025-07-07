<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreativeController;

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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [CreativeController::class, 'index']);
Route::post('/creatives', [CreativeController::class, 'store'])->name('creatives.store');
Route::put('/creatives/{id}', [CreativeController::class, 'update'])->name('creatives.update');
Route::delete('/creatives/{id}', [CreativeController::class, 'destroy'])->name('creatives.destroy');
