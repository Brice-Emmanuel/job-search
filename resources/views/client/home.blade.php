@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Bannière Hero Principale (S'intègre parfaitement avec la Sidebar du layout) -->
    <div class="relative bg-slate-900 rounded-[2.5rem] overflow-hidden min-h-[420px] flex items-center shadow-xl">
        <!-- Image d'arrière-plan avec overlay dégradé -->
        <div class="absolute inset-0">
            <img 
                src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1600" 
                alt="Artisan JobSearch" 
                class="w-full h-full object-cover object-right sm:object-center"
            >
            <!-- Overlay sombre dégradé pour garantir la lisibilité du texte -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/85 to-transparent w-full md:w-3/4"></div>
        </div>

        <!-- Contenu texte au-dessus de l'image -->
        <div class="relative z-10 p-8 sm:p-12 md:p-14 max-w-2xl text-white">
            <!-- Badge Supérieur -->
            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-blue-300 border border-white/10 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">
                <i class="fa-solid fa-shield-check text-xs"></i> Artisans fiables
            </span>

            <!-- Titre Principal -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight tracking-tight">
                Trouvez le professionnel <span class="text-blue-400">idéal</span> pour vos travaux.
            </h1>

            <!-- Description -->
            <p class="mt-4 text-sm sm:text-base text-slate-300 font-medium leading-relaxed max-w-lg">
                Accédez aux meilleurs artisans du Cameroun, sélectionnés pour leur savoir-faire et leur fiabilité.
            </p>

            <!-- Boutons d'action -->
            <div class="mt-8 flex flex-wrap items-center gap-4">
                <a href="{{ route('workers.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-3.5 rounded-2xl transition shadow-lg shadow-blue-600/30 flex items-center gap-2.5">
                    Trouver un pro <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>

                <button class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/20 font-bold text-sm px-6 py-3.5 rounded-2xl transition flex items-center gap-2.5">
                    <i class="fa-solid fa-circle-play text-blue-400"></i> Comment ça marche
                </button>
            </div>
        </div>
    </div>

</div>
@endsection