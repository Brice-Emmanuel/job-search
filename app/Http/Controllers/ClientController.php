<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Affiche le profil / tableau de bord du client.
     */
    public function profile()
    {
        $user = Auth::user();

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
     * Traite la mise à jour du profil client (infos et/ou avatar et/ou photo de fond).
     * Supporte les mises à jour partielles : on peut envoyer uniquement une image,
     * ou uniquement les champs texte, ou les deux à la fois.
     * Répond en JSON si l'appel vient d'AJAX (fetch), sinon redirige classiquement.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:users,email,' . $user->id,
            'telephone' => 'sometimes|required|string|max:20',
            'ville' => 'sometimes|required|string|max:255',
            'quartier' => 'sometimes|required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only(['nom', 'prenom', 'email', 'telephone', 'ville', 'quartier']);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::disk('public')->delete($user->cover_photo);
            }
            $data['cover_photo'] = $request->file('cover_photo')->store('covers', 'public');
        }

        $user->update($data);
        $user->refresh();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Profil mis à jour avec succès.',
                'user' => [
                    'nom' => $user->nom,
                    'prenom' => $user->prenom,
                    'email' => $user->email,
                    'telephone' => $user->telephone,
                    'ville' => $user->ville,
                    'quartier' => $user->quartier,
                    'avatar_url' => $user->avatar ? Storage::url($user->avatar) : null,
                    'cover_url' => $user->cover_photo ? Storage::url($user->cover_photo) : null,
                ],
            ]);
        }

        return redirect()->route('client.profile')->with('success', 'Profil mis à jour avec succès.');
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
        $history = [
            (object) [
                'worker_name' => 'Jean Mvondo',
                'service' => 'Électricien',
                'location' => 'Yaoundé',
                'created_at' => '2026-07-18 10:42:00',
                'action_type' => 'consulted',
            ],
            (object) [
                'worker_name' => 'Sophie Mbella',
                'service' => 'Peintre',
                'location' => 'Douala',
                'created_at' => '2026-07-14 16:20:00',
                'action_type' => 'consulted',
            ],
            (object) [
                'worker_name' => 'Samuel Ndzi',
                'service' => 'Plombier',
                'location' => 'Douala',
                'created_at' => '2026-07-10 09:15:00',
                'action_type' => 'requested',
            ],
        ];

        return view('client.history', compact('history'));
    }
}