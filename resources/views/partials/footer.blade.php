<footer class="bg-white border-t border-slate-200 py-8 px-8 mt-12 text-slate-600 text-xs w-full">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 bg-blue-700 text-white font-bold rounded-xl flex items-center justify-center shadow-sm">JS</div>
                <span class="text-lg font-bold text-slate-900">JobSearch</span>
            </div>
            <p class="text-[11px] leading-relaxed text-slate-500">
                JobSearch met en relation les particuliers avec des travailleurs qualifiés partout au Cameroun.
            </p>
        </div>

        <div>
            <h4 class="font-bold text-slate-900 mb-3 text-xs">Navigation</h4>
            <ul class="space-y-2 text-[11px]">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">Accueil</a></li>
                <li><a href="{{ route('workers.index') }}" class="hover:text-blue-600 transition">Travailleurs</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Catégories</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-slate-900 mb-3 text-xs">Contact</h4>
            <ul class="space-y-2.5 text-[11px] text-slate-500">
                <li class="flex items-center gap-2"><i class="fa-solid fa-phone-volume text-blue-600 text-[10px]"></i> +237 XXX XX XX XX</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-envelope text-blue-600 text-[10px]"></i> contact@jobsearch.cm</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600 text-[10px]"></i> Yaoundé, Cameroun</li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-slate-900 mb-3 text-xs">Suivez-nous</h4>
            <div class="flex gap-2.5">
                <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-facebook-f text-xs"></i></a>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-instagram text-xs"></i></a>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fa-brands fa-linkedin-in text-xs"></i></a>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto pt-4 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center text-[11px] text-slate-400 gap-2">
        <p>© 2026 JobSearch. Tous droits réservés.</p>
        <div class="flex gap-4">
            <a href="#" class="hover:text-slate-600 transition">Politique de confidentialité</a>
            <a href="#" class="hover:text-slate-600 transition">Conditions d'utilisation</a>
        </div>
    </div>
</footer>