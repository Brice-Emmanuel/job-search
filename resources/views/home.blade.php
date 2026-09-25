@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-slate-50 flex flex-col justify-between">

    <!-- HEADER / NAVIGATION PRINCIPALE -->
    <header class="w-full bg-white px-6 sm:px-12 py-5 shadow-sm sticky top-0 z-40">
        <div class="max-w-[1440px] mx-auto flex items-center justify-between">
            <!-- Logo JobSearch -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-black text-xl shadow-md shadow-blue-600/25">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </div>
                <div>
                    <span class="text-xl font-black text-slate-900 tracking-tight block leading-tight">JobSearch</span>
                    <span class="text-[9px] text-blue-600 font-extrabold uppercase tracking-widest block">TROUVER LES MEILLEURS ARTISANS</span>
                </div>
            </div>

            <!-- Actions Droite (Notification, Langue, Connexion) -->
            <div class="flex items-center gap-3">
                <button class="relative p-2.5 text-slate-600 hover:text-slate-900 rounded-full bg-slate-100 hover:bg-slate-200 transition">
                    <i class="fa-regular fa-bell text-base"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                </button>

                <div class="text-xs font-bold bg-slate-100 text-slate-700 px-3.5 py-2.5 rounded-2xl flex items-center gap-1.5">
                    <i class="fa-solid fa-globe text-slate-500 text-xs"></i> FR
                </div>

                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-3 rounded-2xl transition shadow-md shadow-blue-600/20 flex items-center gap-2">
                    <span>Connexion</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main class="max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8 flex-1 w-full">

        <!-- HERO BANNER LARGE -->
        <div class="relative bg-[#091022] rounded-[2.5rem] overflow-hidden min-h-[500px] flex items-center shadow-2xl border border-slate-800/50">
            <div class="absolute inset-0">
                <img 
                    src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1800" 
                    alt="Artisan bâtiment" 
                    class="w-full h-full object-cover object-right"
                >
                <div class="absolute inset-0 bg-gradient-to-r from-[#091022] via-[#091022]/95 to-transparent w-full md:w-3/5"></div>
            </div>

            <div class="relative z-10 p-10 sm:p-14 md:p-16 max-w-2xl text-white space-y-6">
                <div>
                    <span class="inline-block bg-white/10 backdrop-blur-md text-blue-300 border border-white/10 text-[11px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full">
                        ARTISANS FIABLES
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl font-black leading-[1.15] tracking-tight">
                    Trouvez le professionnel <span class="text-[#3b82f6]">idéal</span> pour vos travaux.
                </h1>

                <p class="text-slate-300 text-sm sm:text-base font-normal leading-relaxed max-w-lg">
                    Accédez aux meilleurs artisans du Cameroun, sélectionnés pour leur savoir-faire et leur fiabilité.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ route('workers.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-7 py-3.5 rounded-2xl transition shadow-lg shadow-blue-600/30 flex items-center gap-2">
                        <span>Trouver un pro</span> <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>

                    <a href="{{ route('workers.index') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/20 font-bold text-sm px-7 py-3.5 rounded-2xl transition flex items-center gap-2">
                        <i class="fa-solid fa-play text-[10px]"></i> Comment ça marche
                    </a>
                </div>
            </div>
        </div>

        <!-- BARRE DE FILTRES RAPIDE -->
        <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 flex flex-wrap items-center justify-between gap-3">
            <div class="flex flex-wrap items-center gap-3 flex-1">
                <div class="flex-1 min-w-[200px] bg-slate-50 border border-slate-200/70 rounded-2xl px-4 py-3 flex items-center justify-between text-xs font-bold text-slate-700 cursor-pointer hover:border-slate-300 transition">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-tag text-blue-600"></i> Catégorie</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>

                <div class="flex-1 min-w-[200px] bg-slate-50 border border-slate-200/70 rounded-2xl px-4 py-3 flex items-center justify-between text-xs font-bold text-slate-700 cursor-pointer hover:border-slate-300 transition">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600"></i> Localisation</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>

                <div class="flex-1 min-w-[200px] bg-slate-50 border border-slate-200/70 rounded-2xl px-4 py-3 flex items-center justify-between text-xs font-bold text-slate-700 cursor-pointer hover:border-slate-300 transition">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-calendar-days text-blue-600"></i> Disponibilité</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>

                <div class="flex-1 min-w-[180px] bg-slate-50 border border-slate-200/70 rounded-2xl px-4 py-3 flex items-center justify-between text-xs font-bold text-slate-700 cursor-pointer hover:border-slate-300 transition">
                    <span class="flex items-center gap-2"><i class="fa-solid fa-arrow-down-wide-short text-blue-600"></i> Trier</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
                </div>
            </div>

            <button class="p-3.5 bg-slate-50 border border-slate-200/70 hover:bg-slate-100 rounded-2xl text-slate-700 transition">
                <i class="fa-solid fa-sliders text-xs"></i>
            </button>
        </div>

        <!-- SECTION CATÉGORIES POPULAIRES -->
        <div class="space-y-4 pt-4">
            <div class="flex items-end justify-between">
                <div>
                    <span class="text-[11px] font-extrabold text-blue-600 uppercase tracking-widest block mb-1">EXPLORER LES SERVICES</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Catégories populaires</h2>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium mt-1">Choisissez rapidement un domaine d'intervention.</p>
                </div>
                <a href="{{ route('workers.index') }}" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                    <span>Voir toutes les catégories</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Grille des Catégories -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-4">
                
                <!-- Plomberie -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-blue-600">
                        <i class="fa-solid fa-faucet-drip"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Plomberie</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">1.2K professionnels</p>
                    </div>
                </a>

                <!-- Électricité -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-amber-500">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Électricité</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">980 professionnels</p>
                    </div>
                </a>

                <!-- Maçonnerie -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-orange-500">
                        <i class="fa-solid fa-trowel-bricks"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Maçonnerie</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">1.5K professionnels</p>
                    </div>
                </a>

                <!-- Peinture -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-indigo-500">
                        <i class="fa-solid fa-paint-roller"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Peinture</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">870 professionnels</p>
                    </div>
                </a>

                <!-- Menuiserie -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-stone-100 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-stone-600">
                        <i class="fa-solid fa-hammer"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Menuiserie</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">760 professionnels</p>
                    </div>
                </a>

                <!-- Nettoyage -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-105 transition text-teal-600">
                        <i class="fa-solid fa-broom"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Nettoyage</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">640 professionnels</p>
                    </div>
                </a>

                <!-- Plus -->
                <a href="{{ route('workers.index') }}" class="bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg transition rounded-3xl p-5 flex flex-col items-center text-center space-y-3 group">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-xl text-slate-600 font-bold group-hover:scale-105 transition">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-slate-900">Plus</h3>
                        <p class="text-[10px] font-medium text-slate-400 mt-0.5">12 catégories</p>
                    </div>
                </a>

            </div>
        </div>

    </main>

    <!-- FOOTER PROFESSIONNEL -->
    <footer class="w-full bg-white pt-16 pb-12 mt-20 border-t border-slate-200/60">
        <div class="max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 items-start">
                
                <!-- Logo & Description -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-sm">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </div>
                        <div>
                            <span class="text-lg font-black text-slate-900 tracking-tight block leading-none">JobSearch</span>
                            <span class="text-[8px] text-blue-600 font-extrabold uppercase tracking-widest block mt-0.5">TROUVER LES MEILLEURS ARTISANS</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed pr-4">
                        JobSearch met en relation les particuliers avec des travailleurs qualifiés partout au Cameroun.
                    </p>
                </div>

                <!-- Navigation -->
                <div class="space-y-3">
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Navigation</h4>
                    <ul class="space-y-2.5 text-xs font-medium text-slate-500">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">Accueil</a></li>
                        <li><a href="{{ route('workers.index') }}" class="hover:text-blue-600 transition">Travailleurs</a></li>
                        <li><a href="{{ route('workers.index') }}" class="hover:text-blue-600 transition">Catégories</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="space-y-3">
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-2.5 text-xs font-medium text-slate-500">
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone-volume text-slate-400 text-xs shrink-0"></i>
                            <span>+237 XXX XX XX XX</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-slate-400 text-xs shrink-0"></i>
                            <span>contact@jobsearch.cm</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-location-dot text-slate-400 text-xs shrink-0"></i>
                            <span>Yaoundé, Cameroun</span>
                        </li>
                    </ul>
                </div>

                <!-- Suivez-nous -->
                <div class="space-y-3">
                    <h4 class="text-xs font-black text-slate-900 uppercase tracking-wider">Suivez-nous</h4>
                    <div class="flex items-center gap-3 pt-1">
                        <a href="#" class="w-10 h-10 bg-slate-50 hover:bg-blue-50 hover:text-blue-600 rounded-full flex items-center justify-center text-slate-600 transition border border-slate-100">
                            <i class="fa-brands fa-facebook-f text-xs"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-50 hover:bg-pink-50 hover:text-pink-600 rounded-full flex items-center justify-center text-slate-600 transition border border-slate-100">
                            <i class="fa-brands fa-instagram text-xs"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-50 hover:bg-blue-50 hover:text-blue-700 rounded-full flex items-center justify-center text-slate-600 transition border border-slate-100">
                            <i class="fa-brands fa-linkedin-in text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div>
@endsection