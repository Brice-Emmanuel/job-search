<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'travailleur_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|max:1000',
        ]);

        Intervention::create([
            'client_id' => Auth::id(),
            'travailleur_id' => $request->travailleur_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'statut' => 'en_cours',
        ]);

        return back()->with('success', 'Votre demande d\'intervention a été envoyée avec succès !');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en_cours,terminee,annulee',
        ]);

        $intervention = Intervention::findOrFail($id);
        $intervention->update(['statut' => $request->statut]);

        return back()->with('success', 'Statut de l\'intervention mis à jour.');
    }
}
