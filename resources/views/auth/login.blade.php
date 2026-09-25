 @extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-white flex flex-col justify-between">

    <!-- HEADER / NAVIGATION PRINCIPALE -->
    <header class="w-full bg-white px-6 sm:px-12 py-5 shadow-sm">
        <div class="max-w-[1440px] mx-auto flex items-center justify-between">
            <!-- Logo JobSearch -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-black text-xl shadow-md shadow-blue-600/20">
                    🔍
                </div>
                <div>
                    <span class="text-xl font-black text-slate-900 tracking-tight block leading-tight">JobSearch</span>
                    <span class="text-[9px] text-blue-600 font-extrabold uppercase tracking-widest block">TROUVER LES MEILLEURS ARTISANS</span>
                </div>
            </div>

            <!-- Actions Droite -->
            <div class="flex items-center gap-3">
                <button class="relative p-2.5 text-slate-600 hover:text-slate-900 rounded-full bg-slate-100 hover:bg-slate-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                </button>

                <div class="text-xs font-bold bg-slate-100 text-slate-700 px-3.5 py-2.5 rounded-2xl flex items-center gap-1.5">
                    <span class="text-sm">🌐</span> FR
                </div>

                <a href="{{ route('login') }}" class="bg-[#2563eb] hover:bg-blue-700 text-white text-xs font-bold px-6 py-3 rounded-2xl transition shadow-md shadow-blue-600/20 flex items-center gap-2">
                    <span>Connexion</span> ➔
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-6 flex-1 w-full flex items-center justify-center">

        <!-- GRAND CONTENEUR GLOBAL SOMBRE -->
        <div class="relative bg-[#091022] rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-800/50 w-full grid grid-cols-1 lg:grid-cols-12 items-center min-h-[580px]">
            
            <!-- IMAGE DE FOND GAUCHE (Technicien seul avec casque) -->
            <div class="absolute inset-y-0 left-0 w-full lg:w-7/12">
                <img 
                    src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1800" 
                    alt="Technicien seul" 
                    class="w-full h-full object-cover object-top opacity-85"
                >
                <div class="absolute inset-0 bg-gradient-to-r from-[#091022]/95 via-[#091022]/75 to-[#091022]"></div>
            </div>

            <!-- CONTENU : Texte à gauche (7 colonnes) -->
            <div class="relative z-10 lg:col-span-7 p-8 sm:p-12 space-y-6">
                <div>
                    <span class="inline-block bg-blue-600/30 border border-blue-400/30 text-blue-300 text-[10px] font-black uppercase tracking-widest px-3.5 py-1.5 rounded-full backdrop-blur-md">
                        JOBSEARCH
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight">
                    Votre prochain <br>projet commence <br><span class="text-blue-500">ici.</span>
                </h1>

                <p class="text-slate-300 text-sm sm:text-base font-normal max-w-md leading-relaxed">
                    Une communauté de professionnels vérifiés, disponible partout au Cameroun.
                </p>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-200 bg-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl border border-white/10">
                        <span class="text-blue-400">✔</span> Profils vérifiés
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-200 bg-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl border border-white/10">
                        <span class="text-blue-400">✔</span> Paiement sécurisé
                    </div>
                </div>
            </div>

            <!-- CARTE DE CONNEXION : Droite (5 colonnes) -->
            <div class="relative z-10 lg:col-span-5 p-6 sm:p-8 flex justify-center">
                <div class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-slate-100">
                    
                    <!-- En-tête violet de la carte -->
                    <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-800 p-6 text-white relative">
                        <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs">
                            🛡️
                        </div>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-blue-200 block mb-1">ESPACE SÉCURISÉ</span>
                        <h3 class="text-xl font-black tracking-tight">Connexion</h3>
                        <p class="text-xs text-blue-100 mt-0.5">Bienvenue sur votre espace JobSearch.</p>
                    </div>

                    <!-- Corps du formulaire -->
                    <div class="p-6 space-y-4">
                        <!-- Sélecteur Client / Travailleur -->
                        <div class="grid grid-cols-2 bg-slate-100 p-1 rounded-2xl text-xs font-bold text-center">
                            <button type="button" class="py-2.5 bg-white text-slate-900 rounded-xl shadow-sm transition">Client</button>
                            <button type="button" class="py-2.5 text-slate-500 hover:text-slate-900 transition">Travailleur</button>
                        </div>

                        <!-- Formulaire de connexion -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-[11px] font-bold text-slate-700 uppercase mb-1">Nom d'utilisateur ou e-mail</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">👤</span>
                                    <input type="text" name="email" required placeholder="ex. jean.mvondo" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:outline-none focus:border-blue-600 transition">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[11px] font-bold text-slate-700 uppercase mb-1">Mot de passe</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔒</span>
                                    <input type="password" name="password" required placeholder="••••••••" class="w-full pl-10 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-medium text-slate-900 focus:outline-none focus:border-blue-600 transition">
                                    <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 text-xs cursor-pointer">👁️</span>
                                </div>
                                <div class="text-right mt-1.5">
                                    <a href="#" class="text-[11px] font-bold text-blue-600 hover:underline">Mot de passe oublié ?</a>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold text-xs py-3.5 rounded-2xl transition shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2">
                                <span>Se connecter</span> ➔
                            </button>
                        </form>

                        <div class="border-t border-slate-100 pt-4 text-center">
                            <span class="text-[10px] text-slate-400 uppercase tracking-wide block mb-3">Nouveau sur JobSearch ?</span>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('register.client') }}" class="bg-slate-50 hover:bg-slate-100 text-slate-800 text-[11px] font-bold py-2.5 px-3 rounded-xl border border-slate-200/70 transition text-center">
                                    Créer un compte client
                                </a>
                                <!-- CORRECTION EFFECTUÉE ICI -->
                                <a href="{{ route('register.worker') }}" class="bg-slate-900 hover:bg-slate-800 text-white text-[11px] font-bold py-2.5 px-3 rounded-xl transition text-center flex items-center justify-center">
                                    Je suis travailleur
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="w-full bg-white pt-8 pb-6 border-t border-slate-200/60">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs text-slate-500 font-medium">
            &copy; 2026 JobSearch. Tous droits réservés.
        </div>
    </footer>

</div>
@endsection