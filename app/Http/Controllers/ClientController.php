<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Affiche le profil / tableau de bord du client.
     */
    public function profile()
    {
        // Données fictives ou récupérées depuis l'utilisateur connecté
        $user = auth()->user() ?? (object) [
            'nom' => 'Ndoungue',
            'prenom' => 'Emmanuel',
            'email' => 'emmanuel@example.com',
            'telephone' => '+237 600 000 000',
            'ville' => 'Douala',
            'quartier' => 'Makepe'
        ];

        $demandesEnCoursCount = 3;
        $interventionsTermineesCount = 12;
        $favorisCount = 5;

        return view('client.profile', compact(
            'user',
            'demandesEnCoursCount',
            'interventionsTermineesCount',
            'favorisCount'
        ));
    }

    /**
     * Affiche la liste des favoris du client.
     */
    public function favorites()
    {
        return view('client.favorites');
    }

    /**
     * Affiche l'historique des consultations du client.
     */
    public function history()
    {
        // Données correspondant exactement à l'interface d'historique
        $history = [
            (object) [
                'worker_name' => 'Jean Mvondo',
                'service' => 'Électricien',
                'location' => 'Yaoundé',
                'created_at' => '2026-07-18 10:42:00',
                'action_type' => 'consulted', // Profil consulté
            ],
            (object) [
                'worker_name' => 'Sophie Mbella',
                'service' => 'Peintre',
                'location' => 'Douala',
                'created_at' => '2026-07-14 16:20:00',
                'action_type' => 'consulted', // Profil consulté
            ],
            (object) [
                'worker_name' => 'Samuel Ndzi',
                'service' => 'Plombier',
                'location' => 'Douala',
                'created_at' => '2026-07-10 09:15:00',
                'action_type' => 'requested', // Demande envoyée
            ],
        ];

        return view('client.history', compact('history'));
    }
}