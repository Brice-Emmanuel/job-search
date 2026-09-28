@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-7xl mx-auto">

    <div id="alert-box" class="hidden bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-semibold px-5 py-3 rounded-2xl"></div>

    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

    <!-- BANNIÈRE PROFIL PRINCIPALE -->
    <div id="cover-wrapper" class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 rounded-3xl p-8 md:p-12 text-white shadow-xl overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6"
        @if($user->cover_photo) style="background-image: linear-gradient(to right, rgba(30,58,138,0.85), rgba(30,58,138,0.4)), url('{{ Storage::url($user->cover_photo) }}'); background-size: cover; background-position: center;" @endif>

        <!-- Icône de modification de la bannière -->
        <button type="button" onclick="document.getElementById('coverInput').click()" class="absolute top-6 right-6 w-11 h-11 bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center text-white transition shadow-lg border border-white/30">
            <i class="fa-solid fa-camera-retro text-sm"></i>
        </button>
        <input type="file" id="coverInput" accept="image/*" capture="environment" class="hidden" onchange="uploadImage(this, 'cover_photo')">

        <!-- Avatar et Infos Utilisateur -->
        <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left z-10">
            <div class="relative">
                <div class="w-32 h-32 rounded-full p-1 bg-white/30 backdrop-blur-md shadow-2xl">
                    <img id="avatar-img"
                         src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->prenom . ' ' . $user->nom) . '&background=1d4ed8&color=fff&size=256' }}"
                         alt="{{ $user->prenom }} {{ $user->nom }}" class="w-full h-full object-cover rounded-full">
                </div>
                <button type="button" onclick="document.getElementById('avatarInput').click()" class="absolute bottom-1 right-1 w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center border-2 border-white shadow-lg transition">
                    <i class="fa-solid fa-camera text-xs"></i>
                </button>
                <input type="file" id="avatarInput" accept="image/*" capture="user" class="hidden" onchange="uploadImage(this, 'avatar')">
            </div>

            <!-- Nom, Rôle et Localisation -->
            <div class="space-y-1.5">
                <span class="text-xs uppercase tracking-widest font-extrabold text-blue-200 bg-black/10 px-3 py-1 rounded-full inline-block">Espace client</span>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight text-white">
                    <span id="display-fullname">{{ $user->prenom }} {{ $user->nom }}</span>
                </h1>
                <p class="text-blue-100 text-sm font-medium flex items-center justify-center md:justify-start gap-1.5">
                    <i class="fa-solid fa-location-dot"></i>
                    <span id="display-location">{{ $user->quartier }}, {{ $user->ville }}</span>
                </p>
                <div class="pt-1">
                    <span class="inline-flex items-center gap-1.5 bg-emerald-500/20 border border-emerald-400/30 text-emerald-200 text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">
                        <i class="fa-solid fa-circle-check text-[10px]"></i> Compte vérifié
                    </span>
                </div>
            </div>
        </div>

        <!-- Bouton Modifier / Enregistrer -->
        <div class="z-10">
            <button type="button" id="edit-toggle-btn" onclick="toggleEditMode()" class="bg-white hover:bg-blue-50 text-blue-900 font-bold px-6 py-3.5 rounded-2xl shadow-lg transition-all duration-200 flex items-center gap-2 text-sm">
                <i class="fa-solid fa-user-pen text-xs"></i> <span id="edit-toggle-label">Modifier mon profil</span>
            </button>
        </div>
    </div>

    <!-- SECTION : MES INFORMATIONS -->
    <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-2xl border border-slate-800 space-y-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500 text-slate-900 rounded-2xl flex items-center justify-center text-lg font-bold shadow-md">
                    <i class="fa-solid fa-id-badge"></i>
                </div>
                <div>
                    <span class="text-[10px] text-amber-400 font-black uppercase tracking-widest block">PROFIL PREMIUM</span>
                    <h2 class="text-xl font-bold tracking-tight text-white">Mes informations</h2>
                </div>
            </div>
            <button type="button" id="save-info-btn" onclick="saveInfo()" class="hidden bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-5 py-2.5 rounded-xl transition shadow-md">
                <i class="fa-solid fa-check mr-1"></i> Enregistrer
            </button>
        </div>

        <!-- Grille des cartes d'informations, éditables sur place -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Carte Prénom -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Prénom</span>
                    <p id="display-prenom" class="text-sm font-semibold text-white mt-0.5 truncate">{{ $user->prenom }}</p>
                    <input id="input-prenom" type="text" value="{{ $user->prenom }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte Nom -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-user text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Nom</span>
                    <p id="display-nom" class="text-sm font-semibold text-white mt-0.5 truncate">{{ $user->nom }}</p>
                    <input id="input-nom" type="text" value="{{ $user->nom }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte E-mail -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-at text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">E-mail</span>
                    <p id="display-email" class="text-sm font-semibold text-white mt-0.5 truncate">{{ $user->email }}</p>
                    <input id="input-email" type="email" value="{{ $user->email }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte Téléphone -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-emerald-600/20 text-emerald-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-phone-volume text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Téléphone</span>
                    <p id="display-telephone" class="text-sm font-semibold text-white mt-0.5">{{ $user->telephone }}</p>
                    <input id="input-telephone" type="text" value="{{ $user->telephone }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte Ville -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-rose-600/20 text-rose-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-city text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Ville</span>
                    <p id="display-ville" class="text-sm font-semibold text-white mt-0.5">{{ $user->ville }}</p>
                    <input id="input-ville" type="text" value="{{ $user->ville }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte Quartier -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-rose-600/20 text-rose-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-map-location-dot text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Quartier</span>
                    <p id="display-quartier" class="text-sm font-semibold text-white mt-0.5">{{ $user->quartier }}</p>
                    <input id="input-quartier" type="text" value="{{ $user->quartier }}" class="hidden w-full mt-1 bg-slate-700 text-white text-sm rounded-lg px-2 py-1.5 border border-slate-600 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Carte Compte (non éditable) -->
            <div class="bg-slate-800/80 border border-slate-700/60 p-5 rounded-2xl flex flex-col justify-between gap-4">
                <div class="w-10 h-10 bg-purple-600/20 text-purple-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-user-shield text-sm"></i>
                </div>
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Compte</span>
                    <p class="text-sm font-semibold text-white mt-0.5">Client vérifié</p>
                </div>
            </div>

        </div>
    </div>

    <!-- SECTION : STATISTIQUES -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Demandes en cours</span>
                <div class="w-8 h-8 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center">
                    <i class="fa-solid fa-clock-rotate-left text-xs"></i>
                </div>
            </div>
            <div class="my-4"><span class="text-5xl font-black text-white">{{ $demandesEnCoursCount }}</span></div>
            <p class="text-xs text-slate-400">Suivez l'état de vos requêtes en direct</p>
        </div>

        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Interventions terminées</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <i class="fa-solid fa-circle-check text-xs"></i>
                </div>
            </div>
            <div class="my-4"><span class="text-5xl font-black text-white">{{ $interventionsTermineesCount }}</span></div>
            <p class="text-xs text-slate-400">Prestations réalisées avec succès</p>
        </div>

        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl border border-slate-800 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Artisans favoris</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center">
                    <i class="fa-solid fa-heart-pulse text-xs"></i>
                </div>
            </div>
            <div class="my-4"><span class="text-5xl font-black text-white">{{ $favorisCount }}</span></div>
            <p class="text-xs text-slate-400">Vos professionnels enregistrés</p>
        </div>
    </div>

</div>

<script>
    const csrfToken = document.getElementById('csrf-token').value;
    const updateUrl = "{{ route('client.profile.update') }}";
    let editMode = false;

    function showAlert(message, isError = false) {
        const box = document.getElementById('alert-box');
        box.textContent = message;
        box.classList.remove('hidden', 'bg-emerald-50', 'border-emerald-200', 'text-emerald-700', 'bg-red-50', 'border-red-200', 'text-red-700');
        if (isError) {
            box.classList.add('bg-red-50', 'border-red-200', 'text-red-700');
        } else {
            box.classList.add('bg-emerald-50', 'border-emerald-200', 'text-emerald-700');
        }
        setTimeout(() => box.classList.add('hidden'), 4000);
    }

    // Upload immédiat de l'avatar ou de la photo de fond dès sélection du fichier
    function uploadImage(input, fieldName) {
        if (!input.files || !input.files[0]) return;

        const formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append(fieldName, input.files[0]);

        fetch(updateUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (fieldName === 'avatar' && data.user.avatar_url) {
                    document.getElementById('avatar-img').src = data.user.avatar_url;
                }
                if (fieldName === 'cover_photo' && data.user.cover_url) {
                    const wrapper = document.getElementById('cover-wrapper');
                    wrapper.style.backgroundImage = `linear-gradient(to right, rgba(30,58,138,0.85), rgba(30,58,138,0.4)), url('${data.user.cover_url}')`;
                    wrapper.style.backgroundSize = 'cover';
                    wrapper.style.backgroundPosition = 'center';
                }
                showAlert(data.message);
            } else {
                showAlert("Erreur lors de l'envoi de l'image.", true);
            }
        })
        .catch(() => showAlert("Erreur lors de l'envoi de l'image.", true));
    }

    // Bascule entre mode affichage et mode édition des informations
    function toggleEditMode() {
        editMode = !editMode;
        const fields = ['prenom', 'nom', 'email', 'telephone', 'ville', 'quartier'];

        fields.forEach(field => {
            document.getElementById('display-' + field).classList.toggle('hidden', editMode);
            document.getElementById('input-' + field).classList.toggle('hidden', !editMode);
        });

        document.getElementById('save-info-btn').classList.toggle('hidden', !editMode);
        document.getElementById('edit-toggle-label').textContent = editMode ? 'Annuler' : 'Modifier mon profil';
    }

    // Enregistre les informations modifiées et repasse en mode affichage
    function saveInfo() {
        const formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('prenom', document.getElementById('input-prenom').value);
        formData.append('nom', document.getElementById('input-nom').value);
        formData.append('email', document.getElementById('input-email').value);
        formData.append('telephone', document.getElementById('input-telephone').value);
        formData.append('ville', document.getElementById('input-ville').value);
        formData.append('quartier', document.getElementById('input-quartier').value);

        fetch(updateUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('display-prenom').textContent = data.user.prenom;
                document.getElementById('display-nom').textContent = data.user.nom;
                document.getElementById('display-email').textContent = data.user.email;
                document.getElementById('display-telephone').textContent = data.user.telephone;
                document.getElementById('display-ville').textContent = data.user.ville;
                document.getElementById('display-quartier').textContent = data.user.quartier;
                document.getElementById('display-fullname').textContent = data.user.prenom + ' ' + data.user.nom;
                document.getElementById('display-location').textContent = data.user.quartier + ', ' + data.user.ville;

                toggleEditMode();
                showAlert(data.message);
            } else {
                showAlert("Erreur lors de l'enregistrement.", true);
            }
        })
        .catch(() => showAlert("Erreur lors de l'enregistrement.", true));
    }
</script>
@endsection