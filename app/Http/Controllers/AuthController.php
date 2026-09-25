<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArtisanProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'travailleur') {
                return redirect()->route('worker.dashboard');
            }
            return redirect()->route('client.profile');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->onlyInput('email');
    }

    public function showRegisterClient()
    {
        return view('auth.register-client');
    }

    public function registerClient(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string',
            'quartier' => 'required|string',
            'sexe' => 'required|in:M,F',
            'password' => 'required|string|min:8|confirmed',
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
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('client.profile');
    }

    // --- AJOUT : Affichage du formulaire d'inscription Travailleur ---
    public function showRegisterWorker()
    {
        return view('auth.register-worker');
    }

    // --- AJOUT : Traitement de l'inscription Travailleur ---
    public function registerWorker(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'age' => 'required|integer|min:18',
            'expertise' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'work_days' => 'required|string|max:255',
            'cv' => 'nullable|file|mimes:pdf,docx|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Gestion de l'upload du CV si présent
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        $user = User::create([
            'nom' => $request->last_name,
            'prenom' => $request->first_name,
            'email' => $request->email,
            'telephone' => $request->phone,
            'ville' => $request->city,
            'quartier' => $request->neighborhood,
            'sexe' => $request->gender,
            'age' => $request->age,
            'expertise' => $request->expertise,
            'experience' => $request->experience,
            'work_days' => $request->work_days,
            'cv' => $cvPath,
            'role' => 'travailleur',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('worker.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}