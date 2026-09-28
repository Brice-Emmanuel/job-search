@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800">Mon Planning et Disponibilités</h1>
    <p class="text-gray-600 mt-1">Configure tes jours et tes horaires de travail.</p>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mt-6 max-w-2xl">
        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Jours de travail</label>
                <input type="text" name="work_days" value="{{ Auth::user()->work_days ?? 'Lundi - Vendredi' }}" class="w-full border-gray-300 rounded-lg shadow-sm p-2 border">
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Enregistrer les modifications</button>
        </form>
    </div>

@endsection