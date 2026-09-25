<!-- Hero Banner Principale avec fond Image Artisans Net -->
<div class="relative rounded-3xl overflow-hidden shadow-md min-h-[440px] flex items-center bg-slate-900">
    <!-- Image de fond nette et bien cadrée -->
    <img src="{{ asset('images/technicien1.png') }}" 
         alt="Technicien JobSearch" 
         class="absolute inset-0 w-full h-full object-cover object-[80%_20%] md:object-right">

    <!-- Overlay Dégradé Progressif : sombre à gauche pour le texte, totalement transparent à droite pour la netteté -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/70 via-50% to-transparent"></div>

    <!-- Contenu Hero -->
    <div class="relative z-10 p-8 md:p-12 max-w-xl space-y-6">
        <span class="inline-block px-3.5 py-1.5 bg-slate-800/80 border border-slate-700/60 rounded-full text-[10px] font-black uppercase tracking-widest text-blue-400 backdrop-blur-sm">
            ARTISANS FIABLES
        </span>

        <h1 class="text-3xl md:text-4xl font-black text-white leading-tight drop-shadow-lg">
            Trouvez le professionnel <span class="text-blue-400">idéal</span> pour vos travaux.
        </h1>

        <p class="text-slate-300 text-xs md:text-sm leading-relaxed drop-shadow">
            Accédez aux meilleurs artisans du Cameroun, sélectionnés pour leur savoir-faire et leur fiabilité.
        </p>

        <div class="flex flex-wrap items-center gap-3 pt-2">
            <a href="{{ route('workers.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-2xl text-xs flex items-center gap-2 shadow-lg hover:shadow-blue-600/30 transition">
                Trouver un pro <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
            
            <button class="bg-slate-800/80 hover:bg-slate-800 text-slate-200 border border-slate-700/70 font-bold px-5 py-3 rounded-2xl text-xs flex items-center gap-2 backdrop-blur-sm transition">
                <i class="fa-regular fa-circle-play"></i> Comment ça marche
            </button>
        </div>
    </div>
</div>