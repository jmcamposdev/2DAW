<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;

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

// If the user is authenticated, then the profile routes will be available
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [RentalController::class, 'index'])->name('dashboard');

    // Rentals
    Route::resource('rentals', RentalController::class);
    Route::put('/rentals/{rental}/return', [RentalController::class, 'returnBook'])->name('rentals.returnBook');

    // Authors
    Route::resource('authors', AuthorController::class);
    Route::get('/authors/{author}/has-books', [AuthorController::class, 'hasBooks'])->name('authors.hasBooks');


    // Books
    Route::resource('books', BookController::class);
});

require __DIR__.'/auth.php';
