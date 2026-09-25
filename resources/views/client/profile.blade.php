@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">

    <!-- BANNIÈRE PROFIL PRINCIPALE -->
    <div class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 rounded-3xl p-8 md:p-12 text-white shadow-xl overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
        
        <!-- Icône de modification de la bannière en haut à droite -->
        <button class="absolute top-6 right-6 w-11 h-11 bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center text-white transition shadow-lg border border-white/30">
            <i class="fa-solid fa-camera-retro text-sm"></i>
        </button>

        <!-- Avatar et Infos Utilisateur -->
        <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left z-10">
            <!-- Photo de profil avec badge caméra -->
            <div class="relative">
                <div class="w-32 h-32 rounded-full p-1 bg-white/30 backdrop-blur-md shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60" alt="Marie Etoundi" class="w-full h-full object-cover rounded-full">
                </div>
                <button class="absolute bottom-1 right-1 w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center border-2 border-white shadow-lg transition">
                    <i class="fa-solid fa-camera text-xs"></i>
                </button>
            </div>

            <!-- Nom, Rôle et Localisation -->
            <div class="space-y-1.5">
                <span class="text-xs uppercase tracking-widest font-extrabold text-blue-200 bg-black/10 px-3 py-1 rounded-full inline-block">Espace client</span>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight text-white">Marie Etoundi</h1>
                <p class="text-blue-100 text-sm font-medium flex items-center justify-center md:justify-start gap-1.5">
                    <i class="fa-solid fa-location-dot"></i> Bastos, Yaoundé
                </p>
                <div class="pt-1">
                    <span class="inline-flex items-center gap-1.5 bg-emerald-500/20 border border-emerald-400/30 text-emerald-200 text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">
                        <i class="fa-solid fa-circle-check text-[10px]"></i> Compte vérifié
                    </span>
                </div>
            </div>
        </div>

        <!-- Bouton Modifier mon profil -->
        <div class="z-10">
            <a href="#" class="bg-white hover:bg-blue-50 text-blue-900 font-bold px-6 py-3.5 rounded-2xl shadow-lg transition-all duration-200 flex items-center gap-2 text-sm">
                <i class="fa-solid fa-user-pen text-xs"></i> Modifier mon profil
            </a>
        </div>
    </div>

    <!-- SECTION : MES INFORMATIONS -->
    <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-2xl border border-slate-800 space-y-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-amber-500 text-slate-900 rounded-2xl flex items-center justify-center text-lg font-bold shadow-md">
                <i class="fa-solid fa-id-badge"></i>
            </div>
            <div>
                <span class="text-[10px] text-amber-400 font-black uppercase tracking-widest block">PROFIL PREMIUM</span>
                <h2 class="text-xl font-bold tracking-tight text-white">Mes informations</h2>
            </div>
        </div>

        <!-- Grille des 4 cartes d'informations avec des icônes professionnelles -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Carte E-mail -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4 hover:border-slate-600 transition">
                <div class="w-10 h-10 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-at text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">E-mail</span>
                    <p class="text-sm font-semibold text-white mt-0.5 truncate">marie.etoundi@email.com</p>
                </div>
            </div>

            <!-- Carte Téléphone -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4 hover:border-slate-600 transition">
                <div class="w-10 h-10 bg-emerald-600/20 text-emerald-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-phone-volume text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Téléphone</span>
                    <p class="text-sm font-semibold text-white mt-0.5">+237 6 90 00 00 00</p>
                </div>
            </div>

            <!-- Carte Localisation -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4 hover:border-slate-600 transition">
                <div class="w-10 h-10 bg-rose-600/20 text-rose-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-map-location-dot text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Localisation</span>
                    <p class="text-sm font-semibold text-white mt-0.5">Bastos, Yaoundé</p>
                </div>
            </div>

            <!-- Carte Compte -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4 hover:border-slate-600 transition">
                <div class="w-10 h-10 bg-purple-600/20 text-purple-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-user-shield text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Compte</span>
                    <p class="text-sm font-semibold text-white mt-0.5">Client vérifié</p>
                </div>
            </div>

        </div>
    </div>

    <!-- SECTION : STATISTIQUES (DEMANDES, INTERVENTIONS, FAVORIS) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Bloc 1 -->
        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Demandes en cours</span>
                <div class="w-8 h-8 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center">
                    <i class="fa-solid fa-clock-rotate-left text-xs"></i>
                </div>
            </div>
            <div class="my-4">
                <span class="text-5xl font-black text-white">3</span>
            </div>
            <p class="text-xs text-slate-400">Suivez l'état de vos requêtes en direct</p>
        </div>

        <!-- Bloc 2 -->
        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Interventions terminées</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <i class="fa-solid fa-circle-check text-xs"></i>
                </div>
            </div>
            <div class="my-4">
                <span class="text-5xl font-black text-white">12</span>
            </div>
            <p class="text-xs text-slate-400">Prestations réalisées avec succès</p>
        </div>

        <!-- Bloc 3 -->
        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Artisans favoris</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center">
                    <i class="fa-solid fa-heart-pulse text-xs"></i>
                </div>
            </div>
            <div class="my-4">
                <span class="text-5xl font-black text-white">8</span>
            </div>
            <p class="text-xs text-slate-400">Vos professionnels enregistrés</p>
        </div>

    </div>

</div>
@endsection