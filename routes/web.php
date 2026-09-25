<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;

/*
|--------------------------------------------------------------------------
| Routes Publiques & Accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| Routes d'Authentification (Invités / Guest)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Inscription Client
    Route::get('/register/client', [AuthController::class, 'showRegisterClient'])->name('register.client');
    Route::post('/register/client', [AuthController::class, 'registerClient']);

    // Inscription Travailleur / Artisan
    Route::get('/register/worker', [AuthController::class, 'showRegisterWorker'])->name('register.worker');
    Route::post('/register/worker', [AuthController::class, 'registerWorker']);
});

// Déconnexion (Réservé aux utilisateurs connectés)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Routes Travailleurs / Artisans (Consultation Publique)
|--------------------------------------------------------------------------
*/

Route::prefix('workers')->name('workers.')->group(function () {
    // Liste / Grille des travailleurs (Accessible à tous)
    Route::get('/', [WorkerController::class, 'index'])->name('index');
    
    // Fiche détaillée d'un artisan avec ses avis (Accessible à tous)
    Route::get('/{id}', [WorkerController::class, 'show'])->name('show');
});


/*
|--------------------------------------------------------------------------
| Routes Espace Client (Protégées par Authentification)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('client')->name('client.')->group(function () {
    // Profil / Dashboard du client
    Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
    
    // Modification du profil (Placé avant pour éviter les conflits d'URI)
    Route::get('/profile/edit', [ClientController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [ClientController::class, 'updateProfile'])->name('profile.update');

    // Page Mes favoris
    Route::get('/favorites', [ClientController::class, 'favorites'])->name('favorites');

    // Page Historique
    Route::get('/history', [ClientController::class, 'history'])->name('history');
});