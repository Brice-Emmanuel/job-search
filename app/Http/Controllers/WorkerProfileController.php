<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkerProfileController extends Controller
{
    /**
     * Affiche le profil professionnel du travailleur connecté.
     */
    public function profile()
    {
        $user = Auth::user();

        return view('worker.profile', compact('user'));
    }

    /**
     * Mise à jour du profil du travailleur.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nom' => [
                'sometimes',
                'required',
                'string',
                'max:255'
            ],

            'prenom' => [
                'sometimes',
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'sometimes',
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id
            ],

            'telephone' => [
                'sometimes',
                'required',
                'string',
                'max:30'
            ],

            'ville' => [
                'sometimes',
                'required',
                'string',
                'max:255'
            ],

            'quartier' => [
                'sometimes',
                'required',
                'string',
                'max:255'
            ],

            'expertise' => [
                'sometimes',
                'nullable',
                'string',
                'max:255'
            ],

            'experience' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
                'max:80'
            ],

            'work_days' => [
                'sometimes',
                'nullable',
                'string',
                'max:255'
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'cover_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096'
            ],

            'cv' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120'
            ],
        ]);

        $data = $request->only([
            'nom',
            'prenom',
            'email',
            'telephone',
            'ville',
            'quartier',
            'expertise',
            'experience',
            'work_days',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Avatar
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Photo de couverture
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('cover_photo')) {
            if ($user->cover_photo) {
                Storage::disk('public')->delete($user->cover_photo);
            }

            $data['cover_photo'] = $request->file('cover_photo')
                ->store('covers', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CV
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('cv')) {
            if ($user->cv) {
                Storage::disk('public')->delete($user->cv);
            }

            $data['cv'] = $request->file('cv')
                ->store('cvs', 'public');
        }

        $user->update($data);

        /*
        |--------------------------------------------------------------------------
        | Si le travailleur passe à 1 année ou plus d'expérience,
        | son dossier doit être vérifié.
        |--------------------------------------------------------------------------
        */
        if (
            isset($data['experience']) &&
            (int) $data['experience'] >= 1
        ) {
            $user->update([
                'est_verifie' => false,
                'verification_status' => 'pending',
            ]);
        }

        $user->refresh();

        /*
        |--------------------------------------------------------------------------
        | Réponse AJAX
        |--------------------------------------------------------------------------
        */
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
                    'expertise' => $user->expertise,
                    'experience' => $user->experience,
                    'work_days' => $user->work_days,

                    'verification_status' =>
                        $user->verification_status,

                    'est_verifie' =>
                        $user->est_verifie,

                    'avatar_url' =>
                        $user->avatar
                            ? Storage::url($user->avatar)
                            : null,

                    'cover_url' =>
                        $user->cover_photo
                            ? Storage::url($user->cover_photo)
                            : null,

                    'cv_url' =>
                        $user->cv
                            ? Storage::url($user->cv)
                            : null,
                ],
            ]);
        }

        return redirect()
            ->route('worker.profile')
            ->with(
                'success',
                'Profil mis à jour avec succès.'
            );
    }
}