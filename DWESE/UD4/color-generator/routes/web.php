<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;

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

Route::get('/', [ColorController::class, 'index']);
Route::post('/generate-color', [ColorController::class, 'generateColor'])->name('generate.color');
