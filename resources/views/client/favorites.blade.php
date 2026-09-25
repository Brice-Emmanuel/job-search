@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">

    <!-- Bannière rose/violette -->
    <div class="bg-gradient-to-r from-blue-700 via-indigo-600 to-pink-600 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 space-y-2">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-200 bg-white/10 px-3 py-1 rounded-full backdrop-blur-md inline-block">
                ESPACE CLIENT
            </span>
            <h2 class="text-3xl font-black tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-heart text-pink-300"></i> Mes travailleurs favoris
            </h2>
            <p class="text-sm text-blue-100 font-medium">
                Retrouvez les professionnels que vous souhaitez recontacter.
            </p>
        </div>
    </div>

    <!-- Grille des cartes -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($favorites ?? [] as $worker)
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80 relative hover:shadow-md transition">
                <div class="absolute top-6 right-6 w-9 h-9 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center cursor-pointer shadow-sm">
                    <i class="fa-solid fa-heart text-sm"></i>
                </div>
                <h3 class="text-lg font-black text-slate-900 pr-10">{{ $worker->name }}</h3>
                <p class="text-xs font-bold text-blue-600 mt-0.5">{{ $worker->profession }}</p>
                
                <div class="mt-6 flex items-center justify-between pt-4 border-t border-slate-100 text-xs text-slate-500 font-medium">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> {{ $worker->location }}
                    </span>
                    <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-xl flex items-center gap-1.5 shadow-sm">
                        <i class="fa-solid fa-star text-[10px] text-amber-500"></i> {{ $worker->rating }}
                    </span>
                </div>
            </div>
        @empty
            <!-- Cartes par défaut si la base est vide -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80 relative hover:shadow-md transition">
                <div class="absolute top-6 right-6 w-9 h-9 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center cursor-pointer shadow-sm">
                    <i class="fa-solid fa-heart text-sm"></i>
                </div>
                <h3 class="text-lg font-black text-slate-900 pr-10">Jean Mvondo</h3>
                <p class="text-xs font-bold text-blue-600 mt-0.5">Électricien</p>
                <div class="mt-6 flex items-center justify-between pt-4 border-t border-slate-100 text-xs text-slate-500 font-medium">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Yaoundé
                    </span>
                    <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-xl flex items-center gap-1.5 shadow-sm">
                        <i class="fa-solid fa-star text-[10px] text-amber-500"></i> 4.9
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80 relative hover:shadow-md transition">
                <div class="absolute top-6 right-6 w-9 h-9 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center cursor-pointer shadow-sm">
                    <i class="fa-solid fa-heart text-sm"></i>
                </div>
                <h3 class="text-lg font-black text-slate-900 pr-10">Sophie Mbella</h3>
                <p class="text-xs font-bold text-blue-600 mt-0.5">Peintre</p>
                <div class="mt-6 flex items-center justify-between pt-4 border-t border-slate-100 text-xs text-slate-500 font-medium">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Douala
                    </span>
                    <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-xl flex items-center gap-1.5 shadow-sm">
                        <i class="fa-solid fa-star text-[10px] text-amber-500"></i> 4.8
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80 relative hover:shadow-md transition">
                <div class="absolute top-6 right-6 w-9 h-9 bg-pink-50 text-pink-500 rounded-full flex items-center justify-center cursor-pointer shadow-sm">
                    <i class="fa-solid fa-heart text-sm"></i>
                </div>
                <h3 class="text-lg font-black text-slate-900 pr-10">Armand Essono</h3>
                <p class="text-xs font-bold text-blue-600 mt-0.5">Menuisier</p>
                <div class="mt-6 flex items-center justify-between pt-4 border-t border-slate-100 text-xs text-slate-500 font-medium">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Bafoussam
                    </span>
                    <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-xl flex items-center gap-1.5 shadow-sm">
                        <i class="fa-solid fa-star text-[10px] text-amber-500"></i> 5.0
                    </span>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection