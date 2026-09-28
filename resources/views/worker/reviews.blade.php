@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800">Mes Avis et Évaluations</h1>
    <p class="text-gray-600 mt-1">Découvre les retours et notes laissés par tes clients.</p>

    <div class="space-y-4 mt-6">
        <!-- Exemple d'avis -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Marie Claire</h3>
                <span class="text-amber-500 font-bold">★★★★★</span>
            </div>
            <p class="text-gray-600 mt-2">Travail propre, rapide et très professionnel. Je recommande vivement !</p>
            <p class="text-xs text-gray-400 mt-4">Il y a 2 jours</p>
        </div>
    </div>

@endsection