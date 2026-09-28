<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobSearch - Espace Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="h-full bg-slate-100 font-sans antialiased text-slate-800">

    <div class="min-h-screen flex w-full">

        <!-- SIDEBAR LATÉRALE FIXE (S'affiche uniquement si l'utilisateur est connecté) -->
        @auth
        <aside class="w-72 bg-gradient-to-b from-slate-900 via-slate-900 to-indigo-950 text-white flex-shrink-0 fixed inset-y-0 left-0 z-50 flex flex-col justify-between p-6 shadow-2xl">
            <div>
                <!-- En-tête Sidebar -->
                <div class="mb-10 px-2">
                    <h1 class="text-2xl font-black tracking-tight text-white drop-shadow-sm">JobSearch</h1>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">
                        {{ Auth::user()->role === 'travailleur' ? __('Espace travailleur') : __('Espace client') }}
                    </p>
                </div>

                <!-- Liens de Navigation -->
                <nav class="space-y-2.5">
                    @if (Auth::user()->role === 'travailleur')
                        <!-- NAVIGATION TRAVAILLEUR -->
                        <a href="{{ route('worker.dashboard') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('worker.dashboard') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-house text-base w-5 text-center"></i> {{ __('Tableau de bord') }}
                        </a>

                        <a href="{{ route('worker.interventions') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('worker.interventions') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-briefcase text-base w-5 text-center"></i> {{ __('Interventions') }}
                        </a>

                        <a href="{{ route('worker.schedule') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('worker.schedule') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-calendar-days text-base w-5 text-center"></i> {{ __('Planning') }}
                        </a>

                        <a href="{{ route('worker.profile') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('worker.profile') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-user text-base w-5 text-center"></i> {{ __('Mon profil') }}
                        </a>

                        <a href="{{ route('worker.reviews') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('worker.reviews') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-star text-base w-5 text-center"></i> {{ __('Avis reçus') }}
                        </a>
                    @else
                        <!-- NAVIGATION CLIENT -->
                        <a href="{{ route('home') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-house text-base w-5 text-center"></i> {{ __('Accueil') }}
                        </a>

                        <a href="{{ route('workers.index') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('workers.*') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-users text-base w-5 text-center"></i> {{ __('Travailleurs') }}
                        </a>

                        <a href="{{ route('client.favorites') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.favorites') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-heart text-base w-5 text-center"></i> {{ __('Mes favoris') }}
                        </a>

                        <a href="{{ route('client.history') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.history') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-clock-rotate-left text-base w-5 text-center"></i> {{ __('Historique') }}
                        </a>

                        <a href="{{ route('client.profile') }}" 
                           class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.profile') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                            <i class="fa-solid fa-user text-base w-5 text-center"></i> {{ __('Mon profil') }}
                        </a>
                    @endif
                </nav>
            </div>

            <!-- Bloc Bas de Sidebar -->
            <div class="bg-white/5 backdrop-blur-md p-4 rounded-2xl border border-white/10 shadow-inner">
                <p class="font-bold text-xs uppercase tracking-wider text-slate-400">
                    {{ Auth::user()->role === 'travailleur' ? __('Espace travailleur') : __('Espace client') }}
                </p>
                <p class="text-xs font-medium text-white mt-0.5">
                    {{ Auth::user()->role === 'travailleur' ? __('Travailleur connecté') : __('Client connecté') }}
                </p>
            </div>
        </aside>
        @endauth

        <!-- ZONE DE CONTENU PRINCIPAL -->
        <div class="flex-1 {{ auth()->check() ? 'pl-72' : 'pl-0' }} min-w-0 flex flex-col min-h-screen justify-between transition-all duration-300">
            
            <div class="flex flex-col">
                <!-- TOPBAR COMMUNE -->
                <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between shadow-sm sticky top-0 z-40">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div>
                            <span class="text-base font-black text-slate-900 block leading-none">JobSearch</span>
                            <span class="text-[8px] text-blue-600 font-extrabold uppercase tracking-widest">{{ __('TROUVER LES MEILLEURS ARTISANS') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="relative p-2 text-slate-600 hover:text-slate-900 rounded-full bg-slate-100 hover:bg-slate-200 transition">
                            <i class="fa-regular fa-bell text-sm"></i>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                        </button>

                        <!-- SÉLECTEUR DE LANGUE INTERACTIF FR / EN -->
                        <div class="flex items-center gap-1 bg-slate-100 p-1 rounded-xl shadow-sm">
                            <i class="fa-solid fa-globe text-slate-500 text-xs ml-2"></i>
                            <a href="{{ route('lang.switch', 'fr') }}" 
                               class="px-2.5 py-1 rounded-lg text-xs font-bold transition {{ app()->getLocale() === 'fr' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                                FR
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" 
                               class="px-2.5 py-1 rounded-lg text-xs font-bold transition {{ app()->getLocale() === 'en' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">
                                EN
                            </a>
                        </div>

                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-md shadow-red-600/20 flex items-center gap-1.5">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('Déconnexion') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-sm flex items-center gap-1.5">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Connexion') }}
                            </a>
                        @endauth
                    </div>
                </header>

                <!-- CONTENU UNIQUE DE CHAQUE PAGE -->
                <main class="p-8">
                    @yield('content')
                </main>
            </div>

            <!-- FOOTER GLOBAL -->
            <footer class="bg-white border-t border-slate-200 py-10 px-8 mt-16">
                <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 text-xs text-slate-600">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold">
                                <i class="fa-solid fa-magnifying-glass text-[10px]"></i>
                            </div>
                            <span class="font-black text-slate-900 text-sm">JobSearch</span>
                        </div>
                        <p class="text-slate-500 leading-relaxed">
                            {{ __('JobSearch met en relation les particuliers avec des travailleurs qualifiés partout au Cameroun.') }}
                        </p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-3 text-sm">{{ __('Navigation') }}</h4>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">{{ __('Accueil') }}</a></li>
                            <li><a href="{{ route('workers.index') }}" class="hover:text-blue-600 transition">{{ __('Travailleurs') }}</a></li>
                            <li><a href="#" class="hover:text-blue-600 transition">{{ __('Catégories') }}</a></li>
                            <li><a href="#" class="hover:text-blue-600 transition">{{ __('Contact') }}</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-3 text-sm">{{ __('Contact') }}</h4>
                        <ul class="space-y-2.5 text-slate-500">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-phone-volume text-blue-600 text-xs"></i> +237 XXX XX XX XX</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-envelope text-blue-600 text-xs"></i> contact@jobsearch.cm</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600 text-xs"></i> Yaoundé, Cameroun</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-3 text-sm">{{ __('Suivez-nous') }}</h4>
                        <div class="flex items-center gap-3">
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-facebook-f text-xs"></i></a>
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-instagram text-xs"></i></a>
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-linkedin-in text-xs"></i></a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    @include('partials.chatbot')

</body>
</html>