<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::get('/new-genre', [GenreController::class, 'index'])->name("genre.index");
Route::post('/new-genre', [GenreController::class, 'store'])->name("genre.store");

Route::get('/new-film', [FilmController::class, 'index'])->name("films.index");
Route::post('/new-film', [FilmController::class, 'store'])->name("film.store");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
