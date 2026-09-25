<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\ArtisanProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = ArtisanProfile::where('user_id', $user->id)->first();
        
        $interventions = Intervention::with(['client', 'category'])
            ->where('travailleur_id', $user->id)
            ->latest()
            ->get();

        return view('worker.dashboard', compact('profile', 'interventions'));
    }

    public function updateAvailability(Request $request)
    {
        $profile = ArtisanProfile::where('user_id', Auth::id())->firstOrFail();
        $profile->update([
            'disponible' => $request->has('disponible'),
        ]);

        return back()->with('success', 'Disponibilité mise à jour.');
    }
}
