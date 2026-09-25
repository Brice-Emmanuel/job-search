<aside class="w-72 bg-gradient-to-b from-slate-900 via-slate-900 to-indigo-950 text-white min-h-screen fixed left-0 top-0 flex flex-col justify-between p-6 z-20 shadow-2xl">
    <div>
        <div class="mb-10 px-2">
            <h1 class="text-2xl font-black tracking-tight text-white drop-shadow-sm">JobSearch</h1>
            <p class="text-xs text-slate-400 font-medium mt-0.5">Espace client</p>
        </div>

        <nav class="space-y-2.5">
            <a href="{{ route('home') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                <i class="fa-solid fa-house text-base w-5 text-center"></i> Accueil
            </a>

            <a href="{{ route('workers.index') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('workers.*') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                <i class="fa-solid fa-users text-base w-5 text-center"></i> Travailleurs
            </a>

            <a href="#" 
               class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.favorites') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                <i class="fa-solid fa-heart text-base w-5 text-center"></i> Mes favoris
            </a>

            <a href="#" 
               class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.history') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                <i class="fa-solid fa-clock-rotate-left text-base w-5 text-center"></i> Historique
            </a>

            <a href="{{ route('client.profile') }}" 
               class="flex items-center gap-3.5 px-4 py-3.5 text-sm rounded-2xl transition-all duration-200 {{ request()->routeIs('client.profile') ? 'bg-white/15 text-white font-bold shadow-md backdrop-blur-md border border-white/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 font-semibold border border-white/5' }}">
                <i class="fa-solid fa-user text-base w-5 text-center"></i> Mon profil
            </a>
        </nav>
    </div>

    <div class="bg-white/5 backdrop-blur-md p-4 rounded-2xl border border-white/10 shadow-inner">
        <p class="font-bold text-xs uppercase tracking-wider text-slate-400">Espace client</p>
        <p class="text-xs font-medium text-white mt-0.5">Client connecté</p>
    </div>
</aside>