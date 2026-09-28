<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkerProfileController;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| Route de Changement de Langue (FR / EN)
|--------------------------------------------------------------------------
*/
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');


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
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register/client', [AuthController::class, 'showRegisterClient'])->name('register.client');
    Route::post('/register/client', [AuthController::class, 'registerClient']);

    Route::get('/register/worker', [AuthController::class, 'showRegisterWorker'])->name('register.worker');
    Route::post('/register/worker', [AuthController::class, 'registerWorker']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Routes du Chatbot / Assistant Virtuel (Accessible à tous)
|--------------------------------------------------------------------------
*/
Route::get('/assistant', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/message', [ChatbotController::class, 'ask'])->name('chatbot.message');


/*
|--------------------------------------------------------------------------
| Routes Travailleurs / Artisans (Consultation Publique)
|--------------------------------------------------------------------------
*/

Route::prefix('workers')->name('workers.')->group(function () {
    Route::get('/', [WorkerController::class, 'index'])->name('index');
    Route::get('/{id}', [WorkerController::class, 'show'])->name('show');
});


/*
|--------------------------------------------------------------------------
| Routes Espace Client (Protégées par Authentification)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('client')->name('client.')->group(function () {
    // Profil du client (affichage + édition inline sur la même page)
    Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ClientController::class, 'updateProfile'])->name('profile.update');

    Route::get('/favorites', [ClientController::class, 'favorites'])->name('favorites');
    Route::get('/history', [ClientController::class, 'history'])->name('history');
});


/*
|--------------------------------------------------------------------------
| Routes Espace Travailleur (Protégées par Authentification)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('worker')->name('worker.')->group(function () {
    // Tableau de bord du travailleur
    Route::get('/dashboard', function () {
        return view('worker.dashboard');
    })->name('dashboard');

    // Gestion des interventions / missions
    Route::get('/interventions', function () {
        return view('worker.interventions');
    })->name('interventions');

    // Planning et disponibilités
    Route::get('/schedule', function () {
        return view('worker.schedule');
    })->name('schedule');

    // Profil professionnel (affichage + édition inline sur la même page)
    Route::get('/profile', [WorkerProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [WorkerProfileController::class, 'updateProfile'])->name('profile.update');

    // Avis et évaluations reçus
    Route::get('/reviews', function () {
        return view('worker.reviews');
    })->name('reviews');
});