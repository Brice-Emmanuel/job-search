<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Affiche la page de connexion.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Connexion utilisateur.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'travailleur') {
                return redirect()->route('worker.dashboard');
            }

            return redirect()->route('client.profile');
        }

        return back()
            ->withErrors([
                'email' => 'Identifiants incorrects.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | INSCRIPTION CLIENT
    |--------------------------------------------------------------------------
    */

    /**
     * Affiche le formulaire d'inscription client.
     */
    public function showRegisterClient()
    {
        return view('auth.register-client');
    }

    /**
     * Traite l'inscription d'un client.
     */
    public function registerClient(Request $request)
    {
        $request->validate([
            'nom' => [
                'required',
                'string',
                'max:255',
            ],

            'prenom' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'telephone' => [
                'required',
                'string',
                'max:30',
            ],

            'ville' => [
                'required',
                'string',
                'max:255',
            ],

            'quartier' => [
                'required',
                'string',
                'max:255',
            ],

            'sexe' => [
                'required',
                'in:M,F',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,

            'email' => $request->email,
            'telephone' => $request->telephone,

            'ville' => $request->ville,
            'quartier' => $request->quartier,

            'sexe' => $request->sexe,

            'role' => 'client',

            'password' => Hash::make(
                $request->password
            ),

            /*
            |--------------------------------------------------------------------------
            | Un client n'a pas besoin de vérification professionnelle
            |--------------------------------------------------------------------------
            */
            'est_verifie' => true,
            'verification_status' => 'approved',
        ]);


        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('client.profile')
            ->with(
                'success',
                'Votre compte client a été créé avec succès.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | INSCRIPTION TRAVAILLEUR
    |--------------------------------------------------------------------------
    */

    /**
     * Affiche le formulaire d'inscription travailleur.
     */
    public function showRegisterWorker()
    {
        return view('auth.register-worker');
    }


    /**
     * Traite l'inscription d'un travailleur.
     *
     * À partir de 1 année d'expérience,
     * les documents de vérification deviennent obligatoires.
     */
    public function registerWorker(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS PRINCIPALES
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],

            'first_name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],

            'neighborhood' => [
                'required',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | La migration utilise M/F
            |--------------------------------------------------------------------------
            */
            'gender' => [
                'required',
                'in:M,F',
            ],

            'age' => [
                'required',
                'integer',
                'min:18',
                'max:100',
            ],

            'expertise' => [
                'required',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | IMPORTANT :
            | experience est maintenant un entier.
            |--------------------------------------------------------------------------
            */
            'experience' => [
                'required',
                'integer',
                'min:0',
                'max:80',
            ],

            'work_days' => [
                'required',
                'string',
                'max:255',
            ],

            'cv' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        $experience = (int) $request->experience;


        /*
        |--------------------------------------------------------------------------
        | DOCUMENTS DE VÉRIFICATION
        |--------------------------------------------------------------------------
        |
        | Si le travailleur possède au moins 1 année d'expérience,
        | tous les documents demandés deviennent obligatoires.
        |
        */
        if ($experience >= 1) {

            $request->validate([

                /*
                |--------------------------------------------------------------------------
                | CNI
                |--------------------------------------------------------------------------
                */
                'cni_number' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'cni_document' => [
                    'required',
                    'file',
                    'mimes:jpg,jpeg,png,pdf',
                    'max:5120',
                ],


                /*
                |--------------------------------------------------------------------------
                | JUSTIFICATIFS D'EXPÉRIENCE
                |--------------------------------------------------------------------------
                */
                'experience_documents' => [
                    'required',
                    'array',
                    'min:1',
                    'max:5',
                ],

                'experience_documents.*' => [
                    'file',
                    'mimes:jpg,jpeg,png,pdf',
                    'max:5120',
                ],


                /*
                |--------------------------------------------------------------------------
                | PLAN DE LOCALISATION
                |--------------------------------------------------------------------------
                */
                'localisation_plan' => [
                    'required',
                    'file',
                    'mimes:jpg,jpeg,png,pdf',
                    'max:5120',
                ],


                /*
                |--------------------------------------------------------------------------
                | PHOTO D'IDENTITÉ
                |--------------------------------------------------------------------------
                */
                'photo_identite' => [
                    'required',
                    'image',
                    'mimes:jpg,jpeg,png',
                    'max:5120',
                ],


                /*
                |--------------------------------------------------------------------------
                | CONTACT D'URGENCE 1
                |--------------------------------------------------------------------------
                */
                'emergency_contact_1_name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'emergency_contact_1_phone' => [
                    'required',
                    'string',
                    'max:30',
                ],


                /*
                |--------------------------------------------------------------------------
                | CONTACT D'URGENCE 2
                |--------------------------------------------------------------------------
                */
                'emergency_contact_2_name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'emergency_contact_2_phone' => [
                    'required',
                    'string',
                    'max:30',
                ],
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CRÉATION DU TRAVAILLEUR
        |--------------------------------------------------------------------------
        */
        $user = new User();

        $user->nom = $request->last_name;
        $user->prenom = $request->first_name;

        $user->email = $request->email;
        $user->telephone = $request->phone;

        $user->ville = $request->city;
        $user->quartier = $request->neighborhood;

        $user->sexe = $request->gender;
        $user->age = $request->age;

        $user->role = 'travailleur';

        $user->expertise = $request->expertise;
        $user->experience = $experience;
        $user->work_days = $request->work_days;

        $user->password = Hash::make(
            $request->password
        );


        /*
        |--------------------------------------------------------------------------
        | STATUT DE VÉRIFICATION
        |--------------------------------------------------------------------------
        |
        | Le travailleur n'est jamais considéré comme vérifié
        | automatiquement à son inscription.
        |
        */
        $user->est_verifie = false;
        $user->verification_status = 'pending';


        /*
        |--------------------------------------------------------------------------
        | CV
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('cv')) {

            $user->cv = $request
                ->file('cv')
                ->store(
                    'workers/cv',
                    'local'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | DOSSIER DE VÉRIFICATION
        |--------------------------------------------------------------------------
        */
        if ($experience >= 1) {

            /*
            |--------------------------------------------------------------------------
            | CNI
            |--------------------------------------------------------------------------
            */
            $user->cni_number =
                $request->cni_number;

            $user->cni_document =
                $request
                    ->file('cni_document')
                    ->store(
                        'workers/cni',
                        'local'
                    );


            /*
            |--------------------------------------------------------------------------
            | PLAN DE LOCALISATION
            |--------------------------------------------------------------------------
            */
            $user->localisation_plan =
                $request
                    ->file('localisation_plan')
                    ->store(
                        'workers/localisation',
                        'local'
                    );


            /*
            |--------------------------------------------------------------------------
            | PHOTO D'IDENTITÉ
            |--------------------------------------------------------------------------
            */
            $user->photo_identite =
                $request
                    ->file('photo_identite')
                    ->store(
                        'workers/photos-identite',
                        'local'
                    );


            /*
            |--------------------------------------------------------------------------
            | JUSTIFICATIFS D'EXPÉRIENCE
            |--------------------------------------------------------------------------
            */
            $experienceDocuments = [];

            foreach (
                $request->file('experience_documents')
                as $document
            ) {
                $experienceDocuments[] =
                    $document->store(
                        'workers/experiences',
                        'local'
                    );
            }

            $user->experience_documents =
                $experienceDocuments;


            /*
            |--------------------------------------------------------------------------
            | CONTACT D'URGENCE 1
            |--------------------------------------------------------------------------
            */
            $user->emergency_contact_1_name =
                $request->emergency_contact_1_name;

            $user->emergency_contact_1_phone =
                $request->emergency_contact_1_phone;


            /*
            |--------------------------------------------------------------------------
            | CONTACT D'URGENCE 2
            |--------------------------------------------------------------------------
            */
            $user->emergency_contact_2_name =
                $request->emergency_contact_2_name;

            $user->emergency_contact_2_phone =
                $request->emergency_contact_2_phone;
        }


        /*
        |--------------------------------------------------------------------------
        | SAUVEGARDE
        |--------------------------------------------------------------------------
        */
        $user->save();


        /*
        |--------------------------------------------------------------------------
        | CONNEXION AUTOMATIQUE
        |--------------------------------------------------------------------------
        */
        Auth::login($user);

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('worker.dashboard')
            ->with(
                'success',
                'Votre compte a été créé. Votre dossier est maintenant en attente de vérification par l’administration.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DÉCONNEXION
    |--------------------------------------------------------------------------
    */

    /**
     * Déconnexion de l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}