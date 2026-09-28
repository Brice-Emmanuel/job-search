<?php

namespace App\Http\Controllers;

use App\Models\User;

class WorkerController extends Controller
{
    /**
     * Affiche la liste des travailleurs/artisans.
     *
     * Seuls les travailleurs vérifiés sont visibles publiquement.
     */
    public function index()
    {
        $workers = User::where('role', 'travailleur')
            ->where('est_verifie', true)
            ->where('verification_status', 'approved')
            ->latest()
            ->get();

        return view('workers.index', compact('workers'));
    }

    /**
     * Affiche le profil détaillé d'un travailleur vérifié.
     */
    public function show($id)
    {
        $artisan = User::where('role', 'travailleur')
            ->where('est_verifie', true)
            ->where('verification_status', 'approved')
            ->findOrFail($id);

        return view('workers.show', compact('artisan'));
    }
}