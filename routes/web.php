<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ClassementController;


Route::get('/', function () {
    return view('welcome');
});



// Groupes de routes protégées par l'authentification
// Route::middleware(['auth'])->group(function () {
    Route::resource('sports', SportController::class);
    Route::resource('equipes', EquipeController::class);
    Route::resource('joueurs', JoueurController::class);
    Route::resource('matchs', MatchController::class);
    Route::resource('resultats', ResultatController::class);
    Route::resource('classements', ClassementController::class);
    Route::get('/sports/{id}/confirmDelete', [SportController::class, 'confirmDelete'])->name('sports.confirmDelete');
    Route::delete('/sports/{id}', [SportController::class, 'destroy'])->name('sports.destroy');

// });
