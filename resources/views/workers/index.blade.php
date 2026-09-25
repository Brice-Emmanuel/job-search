@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">

    <!-- En-tête de section avec Titre + Bouton Retour -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Travailleurs les plus populaires</h1>
            <p class="text-sm text-gray-500 font-medium mt-1">Voir les meilleurs profils disponibles</p>
        </div>
        <a href="{{ route('home') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>
    </div>

    <!-- Carte de Recherche -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
        <h2 class="text-2xl font-extrabold text-gray-900">Rechercher un professionnel</h2>
        <p class="text-sm text-gray-500 font-medium mt-0.5">Trouvez le bon travailleur rapidement en saisissant une catégorie ou un métier.</p>

        <form action="{{ route('workers.index') }}" method="GET" class="mt-5 flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher un travailleur, métier..." 
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-2xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:bg-white transition"
                >
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-3 rounded-2xl transition shadow-sm whitespace-nowrap flex items-center justify-center gap-2">
                <i class="fa-solid fa-search"></i> Rechercher un professionnel
            </button>
        </form>
    </div>

    <!-- Grille des Cartes Travailleurs -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($workers ?? [] as $worker)
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition group">
                <div>
                    <!-- Image du travailleur + Badges -->
                    <div class="relative h-52 w-full bg-gray-100 overflow-hidden">
                        <img 
                            src="{{ $worker->photo ?? 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=500' }}" 
                            alt="{{ $worker->name ?? 'Artisan' }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                        >
                        
                        <!-- Badge Disponibilité -->
                        <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full text-white shadow-sm {{ ($worker->status ?? 'Disponible') === 'Disponible' ? 'bg-emerald-500' : 'bg-red-500' }}">
                            {{ $worker->status ?? 'Disponible' }}
                        </span>

                        <!-- Bouton Favori (Cœur) -->
                        <button class="absolute top-4 right-4 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 hover:bg-white transition shadow-sm">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </div>

                    <!-- Corps de la carte -->
                    <div class="p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">
                                    {{ $worker->name ?? ($worker->user->name ?? 'Nom non renseigné') }}
                                </h3>
                                <p class="text-sm font-semibold text-blue-600 mt-0.5">
                                    {{ $worker->profession ?? ($worker->category ?? 'Métier non spécifié') }}
                                </p>
                            </div>
                            <span class="bg-amber-100/80 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-xl flex items-center gap-1">
                                <i class="fa-solid fa-star text-amber-500 text-[10px]"></i> {{ $worker->rating ?? '5.0' }}
                            </span>
                        </div>

                        <div class="mt-4 space-y-1.5 text-xs text-gray-500 font-medium">
                            <p class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-blue-600 w-4"></i> 
                                <span>{{ $worker->location ?? ($worker->city ?? 'Cameroun') }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-blue-600 w-4"></i> 
                                <span>{{ $worker->experience ?? '2 ans' }} d'expérience</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bouton d'action -->
                <div class="p-5 pt-0">
                    <a href="{{ route('workers.show', $worker->id ?? 1) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3 rounded-2xl transition shadow-sm text-center block">
                        Voir le profil
                    </a>
                </div>
            </div>
        @empty
            <!-- Cartes de démonstration -->
            <!-- Carte 1 : Jean Mvondo -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition group">
                <div>
                    <div class="relative h-52 w-full bg-gray-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?q=80&w=500" alt="Jean Mvondo" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full text-white bg-emerald-500 shadow-sm">Disponible</span>
                        <button class="absolute top-4 right-4 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 shadow-sm hover:bg-white transition"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">Jean Mvondo</h3>
                                <p class="text-sm font-semibold text-blue-600 mt-0.5">Électricien</p>
                            </div>
                            <span class="bg-amber-100/80 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-xl flex items-center gap-1"><i class="fa-solid fa-star text-amber-500 text-[10px]"></i> 4.9</span>
                        </div>
                        <div class="mt-4 space-y-1.5 text-xs text-gray-500 font-medium">
                            <p class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600 w-4"></i> Yaoundé</p>
                            <p class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-600 w-4"></i> 8 ans d'expérience</p>
                        </div>
                    </div>
                </div>
                <div class="p-5 pt-0">
                    <a href="{{ route('home') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3 rounded-2xl transition text-center block shadow-sm">Voir le profil</a>
                </div>
            </div>

            <!-- Carte 2 : Samuel Ndzi -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition group">
                <div>
                    <div class="relative h-52 w-full bg-gray-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=500" alt="Samuel Ndzi" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full text-white bg-red-500 shadow-sm">Occupé</span>
                        <button class="absolute top-4 right-4 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 shadow-sm hover:bg-white transition"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">Samuel Ndzi</h3>
                                <p class="text-sm font-semibold text-blue-600 mt-0.5">Plombier</p>
                            </div>
                            <span class="bg-amber-100/80 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-xl flex items-center gap-1"><i class="fa-solid fa-star text-amber-500 text-[10px]"></i> 4.8</span>
                        </div>
                        <div class="mt-4 space-y-1.5 text-xs text-gray-500 font-medium">
                            <p class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600 w-4"></i> Douala</p>
                            <p class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-600 w-4"></i> 12 ans d'expérience</p>
                        </div>
                    </div>
                </div>
                <div class="p-5 pt-0">
                    <a href="{{ route('home') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3 rounded-2xl transition text-center block shadow-sm">Voir le profil</a>
                </div>
            </div>

            <!-- Carte 3 : Sophie Mbella -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition group">
                <div>
                    <div class="relative h-52 w-full bg-gray-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=500" alt="Sophie Mbella" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <span class="absolute top-4 left-4 text-xs font-bold px-3 py-1 rounded-full text-white bg-emerald-500 shadow-sm">Disponible</span>
                        <button class="absolute top-4 right-4 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 shadow-sm hover:bg-white transition"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">Sophie Mbella</h3>
                                <p class="text-sm font-semibold text-blue-600 mt-0.5">Peintre</p>
                            </div>
                            <span class="bg-amber-100/80 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-xl flex items-center gap-1"><i class="fa-solid fa-star text-amber-500 text-[10px]"></i> 4.7</span>
                        </div>
                        <div class="mt-4 space-y-1.5 text-xs text-gray-500 font-medium">
                            <p class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-blue-600 w-4"></i> Yaoundé</p>
                            <p class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-600 w-4"></i> 7 ans d'expérience</p>
                        </div>
                    </div>
                </div>
                <div class="p-5 pt-0">
                    <a href="{{ route('home') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3 rounded-2xl transition text-center block shadow-sm">Voir le profil</a>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection