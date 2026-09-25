<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Affiche la liste des travailleurs/artisans.
     */
    public function index()
    {
        // Récupère tous les utilisateurs ayant le rôle 'travailleur'
        $workers = User::where('role', 'travailleur')->get();

        // Renvoie vers la vue dédiée 'workers.index'
        return view('workers.index', compact('workers'));
    }

    /**
     * Affiche le profil détaillé d'un travailleur.
     */
    public function show($id)
    {
        // Récupère l'artisan en BDD ou renvoie une erreur 404
        $artisan = User::where('role', 'travailleur')->findOrFail($id);

        return view('workers.show', compact('artisan'));
    }
}