@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Carte Informations Travailleur -->
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-2">{{ $artisan->user->prenom }} {{ $artisan->user->nom }}</h2>
        <p class="text-xs text-blue-600 font-bold uppercase">{{ $artisan->category->nom ?? 'Artisan' }}</p>
        <p class="text-xs text-slate-500 mt-2 leading-relaxed">{{ $artisan->bio }}</p>
    </div>

    <!-- Section Avis Clients -->
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-slate-800">Avis clients ({{ $artisan->reviews->count() }})</h3>

        @forelse($artisan->reviews as $review)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-blue-200/80 flex justify-between items-start">
                <div>
                    <h4 class="font-bold text-slate-900 text-sm">{{ $review->client->prenom }} {{ $review->client->nom }}</h4>
                    <p class="text-xs text-slate-600 mt-1">{{ $review->comment }}</p>
                </div>
                <div class="flex text-amber-400 text-xs gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star"></i>
                    @endfor
                </div>
            </div>
        @empty
            <p class="text-xs text-slate-400 bg-white p-6 rounded-2xl border border-slate-200">Aucun avis pour le moment.</p>
        @endforelse
    </div>

</div>
