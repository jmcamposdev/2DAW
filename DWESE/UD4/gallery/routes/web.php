<?php

use App\Http\Controllers\ImageController;
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

// Route to show the gallery
Route::get('/', [ImageController::class, 'showGallery'])
  ->name('image.index');

// Redirect to the gallery if the user tries to access the save route
Route::get('/save', function () {
  return redirect()->route('image.index');
});

// Route to save the image
Route::post('/save', [ImageController::class, 'store'])
  ->name('image.store');
