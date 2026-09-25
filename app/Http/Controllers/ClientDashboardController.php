<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        // Récupération des compteurs affichés sur la maquette
        $demandesEnCoursCount = Intervention::where('client_id', $user->id)
            ->where('statut', 'en_cours')
            ->count();

        $interventionsTermineesCount = Intervention::where('client_id', $user->id)
            ->where('statut', 'terminee')
            ->count();

        $favorisCount = $user->favorites()->count();

        $interventions = Intervention::with(['travailleur', 'category'])
            ->where('client_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('client.profile', compact(
            'user',
            'demandesEnCoursCount',
            'interventionsTermineesCount',
            'favorisCount',
            'interventions'
        ));
    }
}
