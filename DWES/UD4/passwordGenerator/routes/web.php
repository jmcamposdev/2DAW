<?php

use Illuminate\Support\Facades\Route;

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

// en routes/web.php
use App\Http\Controllers\PasswordGeneratorController;

Route::get('/', [PasswordGeneratorController::class, 'index']);
Route::post('/password/generate', [PasswordGeneratorController::class, 'generate'])->name('password.generate');

