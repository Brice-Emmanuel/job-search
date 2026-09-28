@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800">Mes Interventions</h1>
    <p class="text-gray-600 mt-1">Gère les demandes de mission envoyées par les clients.</p>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-6 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                    <th class="p-4">Client</th>
                    <th class="p-4">Service</th>
                    <th class="p-4">Date souhaitée</th>
                    <th class="p-4">Statut</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <!-- Exemple de ligne -->
                <tr>
                    <td class="p-4 font-medium text-gray-800">Jean Dupont</td>
                    <td class="p-4 text-gray-600">Plomberie (Fuite d'eau)</td>
                    <td class="p-4 text-gray-600">30 Sept 2026</td>
                    <td class="p-4"><span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-semibold">En attente</span></td>
                    <td class="p-4 text-right space-x-2">
                        <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">Accepter</button>
                        <button class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">Refuser</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection