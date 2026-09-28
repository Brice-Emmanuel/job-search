@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
    <p class="text-gray-600 mt-1">Bienvenue, {{ Auth::user()->prenom }} ! Voici un aperçu de ton activité.</p>

    <!-- Cartes statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500">Missions acceptées</p>
            <p class="text-3xl font-bold text-indigo-600 mt-2">12</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500">Avis reçus</p>
            <p class="text-3xl font-bold text-green-600 mt-2">4.8 / 5</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500">Interventions en cours</p>
            <p class="text-3xl font-bold text-amber-600 mt-2">2</p>
        </div>
    </div>

@endsection