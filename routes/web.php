<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ClassementController;
use App\Http\Controllers\AuthController;

use App\Models\Matche;
use App\Models\User;
use App\Notifications\NouveauMatchNotification;

Route::get('/', function () {
    return view('welcome');
});



// Groupes de routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    Route::resource('sports', SportController::class);
    Route::resource('equipes', EquipeController::class);
    Route::resource('joueurs', JoueurController::class);
Route::resource('matchs', MatchController::class);
    Route::resource('resultats', ResultatController::class);
    Route::resource('classements', ClassementController::class);
    Route::get('/sports/{id}/confirmDelete', [SportController::class, 'confirmDelete'])->name('sports.confirmDelete');
    Route::delete('/sports/{id}', [SportController::class, 'destroy'])->name('sports.destroy');
    // Route::get('/test-notification', function () {
    //     $matche = Matche::first(); // Assurez-vous d'avoir un match dans la base de données
    //     $user = User::first(); // Assurez-vous d'avoir un utilisateur dans la base de données
    
    //     $user->notify(new NouveauMatchNotification($matche));
    
    //     return 'Notification envoyée !';
    // });
});


Route::get('login', [AuthController::class, "login"])->name("login");
Route::post('toLogin', [AuthController::class, "toLogin"])->name("toLogin");
Route::delete('/logout', [AuthController::class, "logout"])->name("logout");
