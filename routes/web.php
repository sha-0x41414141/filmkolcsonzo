<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;

Route::get('/new-genre', [GenreController::class, 'index'])->name("genre.index");
Route::post('/new-genre', [GenreController::class, 'store'])->name("genre.store");

Route::get('/new-film', [FilmController::class, 'create'])->name("films.create");
Route::post('/new-film', [FilmController::class, 'store'])->name("film.store");
Route::get('/films', [FilmController::class, 'index'])->name("films.index");
Route::get('/films/film/{id}', [FilmController::class, 'show'])->name("films.show");
Route::delete('/films/film/{id}', [FilmController::class, 'destroy'])->name("films.delete");
Route::post('/films/film', [RentController::class, 'store'])->name("rents.store");

Route::get('/rented', [RentController::class, 'index'])->name("rents.index");
Route::put('/rented/{id}', [RentController::class, 'update'])->name('rents.update');

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
