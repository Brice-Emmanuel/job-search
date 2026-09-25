@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">

    <!-- Bannière violette/bleue (Historique des consultations) -->
    <div class="bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 space-y-2">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-200 bg-white/10 px-3 py-1 rounded-full backdrop-blur-md inline-block">
                ESPACE CLIENT
            </span>
            <h2 class="text-3xl font-black tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-clock-rotate-left"></i> Historique des consultations
            </h2>
            <p class="text-sm text-blue-100 font-medium">
                Suivez les profils visités et vos actions récentes.
            </p>
        </div>
    </div>

    <!-- Container des cartes de consultations -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80 space-y-4">
        @forelse($history ?? [] as $item)
            <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-slate-50/60 hover:bg-slate-100/80 p-4 rounded-2xl border border-slate-100 gap-4 transition">
                
                <!-- Infos profil consulté -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                        <i class="fa-solid fa-eye text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-slate-900">
                            {{ $item->worker_name ?? 'Jean Mvondo' }} 
                            <span class="text-blue-600 font-bold">· {{ $item->service ?? 'Électricien' }}</span>
                        </p>
                        <p class="text-xs text-slate-400 font-medium flex items-center gap-1.5 mt-0.5">
                            <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> {{ $item->location ?? 'Yaoundé' }}
                        </p>
                    </div>
                </div>

                <!-- Date, heure et macaron d'action -->
                <div class="flex items-center gap-3 self-end sm:self-auto flex-wrap">
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 flex items-center gap-2 shadow-sm">
                        <i class="fa-regular fa-calendar text-slate-400"></i> {{ \Carbon\Carbon::parse($item->created_at ?? now())->translatedFormat('d F Y') }}
                    </span>

                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 flex items-center gap-2 shadow-sm">
                        <i class="fa-regular fa-clock text-slate-400"></i> {{ \Carbon\Carbon::parse($item->created_at ?? now())->format('H:i') }}
                    </span>

                    @if(($item->action_type ?? 'consulted') === 'requested')
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5">
                            <i class="fa-solid fa-paper-plane text-[10px]"></i> Demande envoyée
                        </span>
                    @else
                        <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5">
                            <i class="fa-solid fa-user-check text-[10px]"></i> Profil consulté
                        </span>
                    @endif
                </div>

            </div>
        @empty
            <!-- Simulation statique si la variable est vide -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-slate-50/60 hover:bg-slate-100/80 p-4 rounded-2xl border border-slate-100 gap-4 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-eye text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-slate-900">
                            Jean Mvondo <span class="text-blue-600 font-bold">· Électricien</span>
                        </p>
                        <p class="text-xs text-slate-400 font-medium flex items-center gap-1.5 mt-0.5">
                            <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Yaoundé
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-calendar text-slate-400"></i> 18 juillet 2026
                    </span>
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-clock text-slate-400"></i> 10:42
                    </span>
                    <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5">
                        <i class="fa-solid fa-user-check text-[10px]"></i> Profil consulté
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-slate-50/60 hover:bg-slate-100/80 p-4 rounded-2xl border border-slate-100 gap-4 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-eye text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-slate-900">
                            Sophie Mbella <span class="text-blue-600 font-bold">· Peintre</span>
                        </p>
                        <p class="text-xs text-slate-400 font-medium flex items-center gap-1.5 mt-0.5">
                            <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Douala
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-calendar text-slate-400"></i> 14 juillet 2026
                    </span>
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-clock text-slate-400"></i> 16:20
                    </span>
                    <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5">
                        <i class="fa-solid fa-user-check text-[10px]"></i> Profil consulté
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-slate-50/60 hover:bg-slate-100/80 p-4 rounded-2xl border border-slate-100 gap-4 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-eye text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold text-slate-900">
                            Samuel Ndzi <span class="text-blue-600 font-bold">· Plombier</span>
                        </p>
                        <p class="text-xs text-slate-400 font-medium flex items-center gap-1.5 mt-0.5">
                            <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i> Douala
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-calendar text-slate-400"></i> 10 juillet 2026
                    </span>
                    <span class="bg-white text-slate-500 text-xs font-semibold px-3 py-1.5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                        <i class="fa-regular fa-clock text-slate-400"></i> 09:15
                    </span>
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3.5 py-1.5 rounded-xl flex items-center gap-1.5">
                        <i class="fa-solid fa-paper-plane text-[10px]"></i> Demande envoyée
                    </span>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection