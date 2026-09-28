@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-white flex flex-col justify-between">
    <header class="w-full bg-white px-6 sm:px-12 py-4 shadow-sm">
        <div class="max-w-[1440px] mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-md shadow-blue-600/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                </div>
                <div>
                    <span class="text-xl font-black text-slate-900 tracking-tight block leading-tight">JobSearch</span>
                    <span class="text-[9px] text-blue-600 font-extrabold uppercase tracking-widest block">TROUVER LES MEILLEURS ARTISANS</span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="button" aria-label="Notifications" class="relative p-2.5 text-slate-600 hover:text-slate-900 rounded-full bg-slate-100 hover:bg-slate-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                </button>

                <div class="text-xs font-bold bg-slate-100 text-slate-700 px-3.5 py-2.5 rounded-2xl flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="M3 12h18M12 3c2.2 2.4 3.3 5.4 3.3 9s-1.1 6.6-3.3 9c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3Z"/></svg>
                    <span>FR</span>
                </div>

                <a href="{{ route('login') }}" class="bg-[#2563eb] hover:bg-blue-700 text-white text-xs font-bold px-6 py-3 rounded-2xl transition shadow-md shadow-blue-600/20 flex items-center gap-2">
                    Connexion
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M20 12H4"/></svg>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-4 flex-1 w-full flex items-center justify-center">
        <div class="relative bg-[#091022] rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-800/50 w-full grid grid-cols-1 lg:grid-cols-12 items-center min-h-[700px]">

            <div class="absolute inset-y-0 left-0 w-full lg:w-5/12 hidden lg:block">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1800" alt="Technicien professionnel" class="w-full h-full object-cover object-top opacity-85">
                <div class="absolute inset-0 bg-gradient-to-r from-[#091022]/95 via-[#091022]/75 to-[#091022]"></div>
            </div>

            <div class="relative z-10 lg:col-span-5 p-8 sm:p-10 space-y-5 hidden lg:block">
                <span class="inline-block bg-blue-600/30 border border-blue-400/30 text-blue-300 text-[10px] font-black uppercase tracking-widest px-3.5 py-1.5 rounded-full backdrop-blur-md">JOBSEARCH</span>

                <h1 class="text-4xl sm:text-5xl font-black text-white leading-[1.1] tracking-tight">
                    Votre prochain <br>projet commence <br><span class="text-blue-500">ici.</span>
                </h1>

                <p class="text-slate-300 text-sm max-w-md leading-relaxed">
                    Une communauté de professionnels vérifiés, disponible partout au Cameroun.
                </p>

                <div class="flex flex-wrap items-center gap-3 pt-1">
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-200 bg-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl border border-white/10">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 2 2 4-4m5.5 2a8.5 8.5 0 1 1-17 0 8.5 8.5 0 0 1 17 0Z"/></svg>
                        Profils vérifiés
                    </div>

                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-200 bg-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl border border-white/10">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2" stroke-width="2"/><path stroke-linecap="round" stroke-width="2" d="M8 10V7a4 4 0 1 1 8 0v3M12 14v2"/></svg>
                        Paiement sécurisé
                    </div>
                </div>
            </div>

            <div class="relative z-10 lg:col-span-7 p-4 sm:p-7 md:p-9 flex justify-center w-full">
                <div class="w-full max-w-2xl bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-slate-100 p-5 sm:p-7">

                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <span class="text-[10px] font-extrabold text-blue-600 uppercase tracking-widest block mb-1">CRÉER UN COMPTE</span>
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Devenez professionnel</h2>
                            <p class="text-xs font-medium text-slate-500 mt-1">Quelques informations pour personnaliser votre expérience.</p>
                        </div>

                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center border border-blue-100/80 shadow-sm shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4" stroke-width="1.8"/></svg>
                        </div>
                    </div>

                    <form id="workerRegistrationForm" action="{{ route('register.worker') }}" method="POST" enctype="multipart/form-data" class="space-y-2.5">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-3 rounded-xl border border-red-200 bg-red-50 p-3">
                                <p class="text-xs font-bold text-red-700 mb-1">Veuillez corriger les erreurs suivantes :</p>
                                <ul class="list-disc list-inside space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-[10px] text-red-600">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label">Nom</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Votre nom" required class="form-input">
                            </div>

                            <div>
                                <label class="field-label">Prénom</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Votre prénom" required class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label">E-mail</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="vous@exemple.com" required class="form-input">
                            </div>

                            <div>
                                <label class="field-label">Numéro de téléphone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+237 6XX XXX XXX" required class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label">Ville</label>
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Saisissez votre ville" required class="form-input">
                            </div>

                            <div>
                                <label class="field-label">Quartier</label>
                                <input type="text" name="neighborhood" value="{{ old('neighborhood') }}" placeholder="Saisissez votre quartier" required class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label">Sexe</label>
                                <select name="gender" required class="form-input">
                                    <option value="">Sélectionnez votre sexe</option>
                                    <option value="M" {{ old('gender') === 'M' ? 'selected' : '' }}>Homme</option>
                                    <option value="F" {{ old('gender') === 'F' ? 'selected' : '' }}>Femme</option>
                                </select>
                            </div>

                            <div>
                                <label class="field-label">Âge</label>
                                <input type="number" name="age" value="{{ old('age') }}" placeholder="Ex. 28" min="18" max="100" required class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m14.7 6.3 3-3a2.1 2.1 0 1 1 3 3l-3 3M12 9l3 3m-8.5 8.5L3 21l.5-3.5L14 7l3 3-10.5 10.5Z"/></svg>
                                    Domaine d'expertise
                                </label>

                                <input type="text" name="expertise" value="{{ old('expertise') }}" placeholder="Ex. Électricité, plomberie..." required class="form-input">
                            </div>

                            <div>
                                <label class="field-label flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="M12 7v5l3 2"/></svg>
                                    Années d'expérience
                                </label>

                                <select name="experience" id="experience" required class="form-input">
                                    <option value="" disabled {{ old('experience') === null ? 'selected' : '' }}>
                                        Sélectionnez vos années d'expérience
                                    </option>

                                    @for ($i = 0; $i <= 100; $i++)
                                        <option value="{{ $i }}" {{ old('experience') !== null && (string) old('experience') === (string) $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>

                                <p class="mt-1 text-[9px] text-slate-400">
                                    0 année est accepté. À partir de 1 an, les justificatifs sont demandés.
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="17" rx="2" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="M16 2v4M8 2v4M3 10h18"/></svg>
                                    Jours de travail
                                </label>

                                <div class="flex items-center gap-2">
                                    <select id="workDaySelect" class="form-input flex-1">
                                        <option value="">Sélectionner un jour</option>
                                        <option value="Lundi">Lundi</option>
                                        <option value="Mardi">Mardi</option>
                                        <option value="Mercredi">Mercredi</option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">Vendredi</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                    </select>

                                    <button type="button" id="addWorkDayButton" class="hidden w-10 h-10 shrink-0 rounded-xl bg-blue-600 hover:bg-blue-700 text-white items-center justify-center shadow-md shadow-blue-600/20 transition" aria-label="Ajouter un jour">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14"/></svg>
                                    </button>
                                </div>

                                <div id="selectedWorkDays" class="flex flex-wrap gap-1.5 mt-2"></div>
                                <input type="hidden" name="work_days" id="work_days" value="{{ old('work_days') }}" required>
                                <p class="text-[9px] text-slate-400 mt-1">Sélectionnez au moins un jour.</p>
                            </div>

                            <div>
                                <label class="field-label flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-5-5Z"/><path stroke-linecap="round" stroke-width="1.8" d="M14 2v5h5M9 13h6M9 17h4"/></svg>
                                    CV
                                </label>

                                <button type="button" onclick="openFileChooser('cv')" class="upload-button">
                                    <span id="cvLabel" class="flex items-center gap-1.5 truncate">
                                        <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-5-5Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 2v5h5M9 13h6M9 17h4"/></svg>
                                        <span>Ajouter votre CV</span>
                                    </span>

                                    <span class="text-[11px] font-bold text-blue-600 shrink-0">Choisir</span>
                                </button>

                                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" class="hidden">
                                <p class="text-[9px] text-slate-400 mt-1">PDF, DOC ou DOCX uniquement.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="field-label">Mot de passe</label>

                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="8 caractères minimum" required class="form-input pr-10">

                                    <button type="button" onclick="togglePassword('password',this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-blue-600">
                                        <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5" stroke-width="1.8"/></svg>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="field-label">Confirmer le mot de passe</label>

                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Répétez votre mot de passe" required class="form-input pr-10">

                                    <button type="button" onclick="togglePassword('password_confirmation',this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-blue-600">
                                        <svg class="w-4 h-4 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5" stroke-width="1.8"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="pt-1">
                            <button type="submit" class="w-full bg-[#1b51e6] hover:bg-blue-700 text-white font-bold text-xs py-3.5 rounded-xl transition shadow-lg shadow-blue-600/20 flex items-center justify-center gap-2">
                                Créer mon compte

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                                </svg>
                            </button>
                        </div>

                        <div id="verificationModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-3 sm:p-4">
                            <div id="verificationOverlay" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>

                            <div class="relative z-10 w-full max-w-2xl max-h-[92vh] overflow-y-auto bg-white rounded-[2rem] shadow-2xl">

                                <div class="sticky top-0 z-20 bg-white border-b border-slate-100 px-5 sm:px-7 py-4 flex items-start justify-between">
                                    <div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-blue-600">Vérification du profil</span>
                                        <h3 class="text-xl font-black text-slate-900 mt-1">Vérifiez votre dossier</h3>
                                        <p id="verificationDescription" class="text-[11px] text-slate-500 mt-1">Les informations seront vérifiées par l'administration.</p>
                                    </div>

                                    <button type="button" id="closeVerificationModal" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6 6 18"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="px-5 sm:px-7 py-4 space-y-4">

                                    <div class="rounded-xl bg-blue-50 border border-blue-100 p-3 flex gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.3 3.7l-7 12.1A2 2 0 0 0 5 18.8h14a2 2 0 0 0 1.7-3L13.7 3.7a2 2 0 0 0-3.4 0Z"/>
                                            </svg>
                                        </div>

                                        <div>
                                            <p class="text-xs font-bold text-blue-900">Dossier confidentiel</p>
                                            <p class="text-[10px] text-blue-700 mt-0.5">Ces documents servent uniquement à vérifier votre profil.</p>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="section-title">
                                            <span class="section-number">1</span>
                                            Carte Nationale d'Identité
                                        </h4>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div>
                                                <label class="field-label">Numéro de CNI</label>
                                                <input type="text" name="cni_number" id="cni_number" value="{{ old('cni_number') }}" placeholder="Numéro de votre CNI" class="form-input">
                                            </div>

                                            <div>
                                                <label class="field-label">Document CNI</label>

                                                <button type="button" onclick="openFileChooser('cni_document')" class="upload-button">
                                                    <span id="cni_documentLabel" class="truncate">Choisir le document CNI</span>
                                                    <span class="text-blue-600 font-bold shrink-0">Choisir</span>
                                                </button>

                                                <input type="file" name="cni_document" id="cni_document" accept=".jpg,.jpeg,.png,.pdf" class="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="experienceUploadSection" class="rounded-xl border border-slate-200 p-3 transition">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <h4 class="text-sm font-black text-slate-900 flex items-center gap-2">
                                                    <span class="section-number">2</span>
                                                    Justificatifs d'expérience
                                                </h4>

                                                <p class="text-[10px] text-slate-500 mt-1">Minimum 1 document, maximum 5.</p>
                                            </div>

                                            <span id="experienceStatus" class="text-[9px] font-black px-2.5 py-1 rounded-full">REQUIS</span>
                                        </div>

                                        <button type="button" id="experienceUploadButton" onclick="openFileChooser('experience_documents')" class="upload-button">
                                            <span id="experience_documentsLabel">Ajouter un justificatif</span>
                                            <span class="text-blue-600 font-bold">Choisir</span>
                                        </button>

                                        <input type="file" name="experience_documents[]" id="experience_documents" accept=".jpg,.jpeg,.png,.pdf" multiple class="hidden">

                                        <p id="experienceFilesInfo" class="text-[10px] text-slate-400 mt-1"></p>
                                    </div>

                                    <div>
                                        <h4 class="section-title mb-2.5">
                                            <span class="section-number">3</span>
                                            Localisation et identité
                                        </h4>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div>
                                                <label class="field-label">Plan de localisation</label>

                                                <button type="button" onclick="openFileChooser('localisation_plan')" class="upload-button">
                                                    <span id="localisation_planLabel">Ajouter le plan</span>
                                                    <span class="text-blue-600 font-bold">Choisir</span>
                                                </button>

                                                <input type="file" name="localisation_plan" id="localisation_plan" accept=".jpg,.jpeg,.png,.pdf" class="hidden">
                                            </div>

                                            <div>
                                                <label class="field-label">Photo d'identité</label>

                                                <button type="button" onclick="openFileChooser('photo_identite')" class="upload-button">
                                                    <span id="photo_identiteLabel">Ajouter une photo</span>
                                                    <span class="text-blue-600 font-bold">Choisir</span>
                                                </button>

                                                <input type="file" name="photo_identite" id="photo_identite" accept=".jpg,.jpeg,.png" class="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="section-title mb-2">
                                            <span class="section-number">4</span>
                                            Contacts d'urgence
                                        </h4>

                                        <p class="text-[10px] text-slate-500 mb-2.5">
                                            Deux personnes différentes doivent pouvoir être contactées.
                                        </p>

                                        <div class="rounded-xl border border-slate-200 p-3 mb-2.5">
                                            <p class="text-xs font-black text-slate-800 mb-2">Contact 1</p>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                <input type="text" name="emergency_contact_1_name" id="emergency_contact_1_name" value="{{ old('emergency_contact_1_name') }}" placeholder="Nom complet" class="form-input">
                                                <input type="tel" name="emergency_contact_1_phone" id="emergency_contact_1_phone" value="{{ old('emergency_contact_1_phone') }}" placeholder="+237 6XX XXX XXX" class="form-input">
                                            </div>
                                        </div>

                                        <div class="rounded-xl border border-slate-200 p-3">
                                            <p class="text-xs font-black text-slate-800 mb-2">Contact 2</p>

                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                <input type="text" name="emergency_contact_2_name" id="emergency_contact_2_name" value="{{ old('emergency_contact_2_name') }}" placeholder="Nom complet" class="form-input">
                                                <input type="tel" name="emergency_contact_2_phone" id="emergency_contact_2_phone" value="{{ old('emergency_contact_2_phone') }}" placeholder="+237 6XX XXX XXX" class="form-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sticky bottom-0 bg-white border-t border-slate-100 px-5 sm:px-7 py-3 flex flex-col sm:flex-row items-center justify-between gap-2">
                                    <p id="verificationFooterText" class="text-[10px] text-slate-400"></p>

                                    <button type="button" id="confirmVerification" class="w-full sm:w-auto bg-[#1b51e6] hover:bg-blue-700 text-white font-bold text-xs px-6 py-2.5 rounded-xl transition">
                                        Confirmer mon dossier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="text-center pt-3 border-t border-slate-100 mt-4">
                        <p class="text-xs font-medium text-slate-500">
                            Déjà un compte ?
                            <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:underline">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full bg-white pt-5 pb-4 border-t border-slate-200/60">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs text-slate-500 font-medium">
            &copy; {{ date('Y') }} JobSearch. Tous droits réservés.
        </div>
    </footer>
</div>

<div id="fileChooserModal" class="fixed inset-0 z-[10000] hidden items-end sm:items-center justify-center p-3 sm:p-4">
    <div id="fileChooserOverlay" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>

    <div class="relative z-10 w-full max-w-md bg-white rounded-[1.5rem] shadow-2xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 id="fileChooserTitle" class="text-base font-black text-slate-900">Ajouter un fichier</h3>
                <p id="fileChooserDescription" class="text-[10px] text-slate-400 mt-0.5">Choisissez comment vous souhaitez l'ajouter.</p>
            </div>

            <button type="button" onclick="closeFileChooser()" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center hover:bg-slate-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        </div>

        <div class="p-4 space-y-2.5">
            <button type="button" id="cameraOption" onclick="chooseCamera()" class="w-full flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-blue-400 hover:bg-blue-50 transition text-left">
                <span class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h3l1.5-2h7L17 7h3a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z"/>
                        <circle cx="12" cy="13" r="3.5" stroke-width="1.8"/>
                    </svg>
                </span>

                <span>
                    <span class="block text-sm font-black text-slate-900">Prendre une photo</span>
                    <span id="cameraOptionDescription" class="block text-[10px] text-slate-400 mt-0.5">Utiliser directement la caméra</span>
                </span>
            </button>

            <button type="button" onclick="chooseImport()" class="w-full flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-blue-400 hover:bg-blue-50 transition text-left">
                <span class="w-11 h-11 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-width="1.8" d="M4 5a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5Z"/>
                        <path stroke-linecap="round" stroke-width="1.8" d="M13 3v5h5M8 15h8M8 11h2"/>
                    </svg>
                </span>

                <span>
                    <span class="block text-sm font-black text-slate-900">Importer depuis l'appareil</span>
                    <span class="block text-[10px] text-slate-400 mt-0.5">Choisir un fichier existant</span>
                </span>
            </button>
        </div>
    </div>
</div>

<input type="file" id="camera_cni_document" accept="image/*" capture="environment" class="hidden">
<input type="file" id="camera_experience_documents" accept="image/*" capture="environment" class="hidden">
<input type="file" id="camera_localisation_plan" accept="image/*" capture="environment" class="hidden">
<input type="file" id="camera_photo_identite" accept="image/*" capture="environment" class="hidden">

<script>
let currentFileInput=null,currentCameraInput=null,verificationConfirmed=false;

const $=id=>document.getElementById(id);

const form=$('workerRegistrationForm');
const experienceField=$('experience');
const experienceInput=$('experience_documents');

const fileChooserModal=$('fileChooserModal');
const cameraOption=$('cameraOption');
const cameraOptionDescription=$('cameraOptionDescription');
const fileChooserTitle=$('fileChooserTitle');
const fileChooserDescription=$('fileChooserDescription');

const verificationModal=$('verificationModal');
const experienceUploadButton=$('experienceUploadButton');
const experienceStatus=$('experienceStatus');
const experienceFilesInfo=$('experienceFilesInfo');
const experienceUploadSection=$('experienceUploadSection');
const verificationDescription=$('verificationDescription');
const verificationFooterText=$('verificationFooterText');

function openFileChooser(inputId){
    const input=$(inputId);

    if(!input||input.disabled)return;

    currentFileInput=input;

    const cameras={
        cni_document:'camera_cni_document',
        experience_documents:'camera_experience_documents',
        localisation_plan:'camera_localisation_plan',
        photo_identite:'camera_photo_identite'
    };

    currentCameraInput=cameras[inputId]?$(cameras[inputId]):null;

    const data={
        cv:['Ajouter votre CV','Le CV doit être importé depuis votre appareil.',false,'Caméra indisponible pour les fichiers PDF, DOC et DOCX.'],
        cni_document:['Ajouter le document CNI','Prenez une photo de votre CNI ou importez-la.',true,'Utiliser directement la caméra'],
        experience_documents:['Ajouter un justificatif','Prenez une photo ou importez vos justificatifs.',true,'Utiliser directement la caméra'],
        localisation_plan:['Ajouter le plan de localisation','Prenez une photo du plan ou importez-le.',true,'Utiliser directement la caméra'],
        photo_identite:["Ajouter une photo d'identité",'Prenez directement votre photo ou importez-la.',true,'Utiliser directement la caméra']
    }[inputId];

    if(data){
        fileChooserTitle.textContent=data[0];
        fileChooserDescription.textContent=data[1];
        cameraOption.disabled=!data[2];
        cameraOptionDescription.textContent=data[3];

        cameraOption.classList.toggle('opacity-50',!data[2]);
        cameraOption.classList.toggle('cursor-not-allowed',!data[2]);
        cameraOption.classList.toggle('bg-slate-50',!data[2]);
    }

    fileChooserModal.classList.remove('hidden');
    fileChooserModal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeFileChooser(){
    fileChooserModal.classList.add('hidden');
    fileChooserModal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');

    currentFileInput=null;
    currentCameraInput=null;
}

function chooseImport(){
    if(!currentFileInput)return;

    const input=currentFileInput;

    closeFileChooser();

    setTimeout(()=>input.click(),50);
}

function chooseCamera(){
    if(!currentFileInput||!currentCameraInput||cameraOption.disabled)return;

    const input=currentCameraInput;

    closeFileChooser();

    setTimeout(()=>{
        input.value='';
        input.click();
    },50);
}

$('fileChooserOverlay').addEventListener('click',closeFileChooser);

function setInputFiles(input,files){
    if(!input||!files?.length)return;

    const dt=new DataTransfer();

    Array.from(files).forEach(file=>dt.items.add(file));

    input.files=dt.files;
    input.dispatchEvent(new Event('change',{bubbles:true}));
}

$('cv').addEventListener('change',function(){
    if(this.files.length){
        $('cvLabel').innerHTML=`
            <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2-2h10a2 2 0 0 0 2-2V7l-5-5Z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 2v5h5M9 13h6M9 17h4"/>
            </svg>
            <span class="truncate">${this.files[0].name}</span>
        `;
    }
});

$('cni_document').addEventListener('change',function(){
    if(this.files.length)$('cni_documentLabel').textContent=this.files[0].name;
});

$('localisation_plan').addEventListener('change',function(){
    if(this.files.length)$('localisation_planLabel').textContent=this.files[0].name;
});

$('photo_identite').addEventListener('change',function(){
    if(this.files.length)$('photo_identiteLabel').textContent=this.files[0].name;
});

experienceInput.addEventListener('change',function(){
    if(this.files.length>5){
        alert('Vous pouvez ajouter au maximum 5 justificatifs.');
        setInputFiles(this,Array.from(this.files).slice(0,5));
        return;
    }

    updateExperienceFilesDisplay();
});

function updateExperienceFilesDisplay(){
    const count=experienceInput.files.length;

    $('experience_documentsLabel').textContent=count
        ? `${count} justificatif(s) sélectionné(s)`
        : 'Ajouter un justificatif';

    experienceFilesInfo.textContent=count
        ? `${count} document(s) sélectionné(s).`
        : "Ajoutez au moins 1 justificatif et maximum 5.";
}

$('camera_cni_document').addEventListener('change',function(){
    if(this.files.length)setInputFiles($('cni_document'),this.files);
});

$('camera_localisation_plan').addEventListener('change',function(){
    if(this.files.length)setInputFiles($('localisation_plan'),this.files);
});

$('camera_photo_identite').addEventListener('change',function(){
    if(this.files.length)setInputFiles($('photo_identite'),this.files);
});

$('camera_experience_documents').addEventListener('change',function(){
    if(!this.files.length)return;

    const files=Array.from(experienceInput.files).concat(Array.from(this.files));

    if(files.length>5){
        alert('Vous pouvez ajouter au maximum 5 justificatifs.');
        setInputFiles(experienceInput,files.slice(0,5));
    }else{
        setInputFiles(experienceInput,files);
    }
});

const workDaySelect=$('workDaySelect');
const addWorkDayButton=$('addWorkDayButton');
const selectedWorkDaysContainer=$('selectedWorkDays');
const workDaysInput=$('work_days');

const availableDays=[
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche'
];

let selectedWorkDays=[];

function initializeWorkDays(){
    const oldDays=@json(old('work_days',''));

    if(!oldDays)return;

    oldDays.split(',').map(x=>x.trim()).forEach(day=>{
        const found=availableDays.find(x=>x.toLowerCase()===day.toLowerCase());

        if(found&&!selectedWorkDays.includes(found)){
            selectedWorkDays.push(found);
        }
    });

    renderWorkDays();
}

function renderWorkDays(){
    selectedWorkDaysContainer.innerHTML='';

    selectedWorkDays.forEach(day=>{
        const chip=document.createElement('div');

        chip.className='inline-flex items-center gap-1.5 bg-blue-50 border border-blue-100 text-blue-700 rounded-lg px-2.5 py-1 text-[10px] font-bold';

        chip.innerHTML=`
            <span>${day}</span>
            <button type="button" class="text-blue-400 hover:text-red-500" onclick="removeWorkDay('${day}')">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        `;

        selectedWorkDaysContainer.appendChild(chip);
    });

    workDaysInput.value=selectedWorkDays.join(', ');

    const hasChoice=!!workDaySelect.value;

    addWorkDayButton.classList.toggle('hidden',!hasChoice);
    addWorkDayButton.classList.toggle('flex',hasChoice);
}

workDaySelect.addEventListener('change',renderWorkDays);

addWorkDayButton.addEventListener('click',()=>{
    const day=workDaySelect.value;

    if(!day)return;

    if(selectedWorkDays.includes(day)){
        alert('Ce jour est déjà sélectionné.');
        workDaySelect.value='';
        renderWorkDays();
        return;
    }

    selectedWorkDays.push(day);
    workDaySelect.value='';
    renderWorkDays();
});

function removeWorkDay(day){
    selectedWorkDays=selectedWorkDays.filter(x=>x!==day);
    renderWorkDays();
}

function openVerificationModal(){
    if(experienceField.value==='')return;

    updateExperienceState();

    verificationModal.classList.remove('hidden');
    verificationModal.classList.add('flex');

    document.body.classList.add('overflow-hidden');
}

function closeVerification(){
    verificationModal.classList.add('hidden');
    verificationModal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');
}

$('closeVerificationModal').addEventListener('click',closeVerification);
$('verificationOverlay').addEventListener('click',closeVerification);

function updateExperienceState(){
    const selectedValue=experienceField.value;

    if(selectedValue===''){
        experienceInput.disabled=true;
        experienceUploadButton.disabled=true;
        experienceUploadSection.classList.add('hidden');

        experienceStatus.textContent='NON REQUIS';
        experienceStatus.className='text-[9px] font-black px-2.5 py-1 rounded-full bg-slate-100 text-slate-500';

        verificationDescription.textContent="Sélectionnez votre nombre d'années d'expérience.";

        verificationFooterText.textContent="";
        return;
    }

    const experience=parseInt(selectedValue,10);

    if(isNaN(experience)||experience<0||experience>100)return;

    if(experience===0){
        experienceInput.disabled=true;
        experienceUploadButton.disabled=true;
        experienceUploadSection.classList.add('hidden');

        experienceStatus.textContent='NON REQUIS';
        experienceStatus.className='text-[9px] font-black px-2.5 py-1 rounded-full bg-slate-100 text-slate-500';

        verificationDescription.textContent="Vous avez indiqué 0 année d'expérience. Aucun justificatif d'expérience n'est nécessaire.";

        verificationFooterText.textContent="Vous pouvez confirmer votre dossier sans justificatif d'expérience.";
    }else{
        experienceInput.disabled=false;
        experienceUploadButton.disabled=false;

        experienceUploadSection.classList.remove('hidden');
        experienceUploadSection.classList.remove('bg-slate-50','border-slate-100');

        experienceStatus.textContent='REQUIS';
        experienceStatus.className='text-[9px] font-black px-2.5 py-1 rounded-full bg-blue-100 text-blue-600';

        verificationDescription.textContent="Votre expérience professionnelle doit être vérifiée par l'administration.";

        verificationFooterText.textContent="Un justificatif d'expérience minimum est nécessaire.";

        updateExperienceFilesDisplay();
    }
}

experienceField.addEventListener('change',()=>{
    if(experienceField.value==='')return;

    verificationConfirmed=false;
    updateExperienceState();
    openVerificationModal();
});

form.addEventListener('submit',event=>{
    if(experienceField.value===''){
        event.preventDefault();
        alert("Veuillez sélectionner votre nombre d'années d'expérience.");
        experienceField.focus();
        return;
    }

    const experience=parseInt(experienceField.value,10);

    if(!selectedWorkDays.length){
        event.preventDefault();
        alert('Veuillez sélectionner au moins un jour de travail.');
        workDaySelect.focus();
        return;
    }

    if(!verificationConfirmed){
        event.preventDefault();
        openVerificationModal();
        return;
    }

    if(experience>=1&&experienceInput.files.length<1){
        event.preventDefault();
        verificationConfirmed=false;
        openVerificationModal();
    }
});

$('confirmVerification').addEventListener('click',()=>{
    if(experienceField.value===''){
        alert("Veuillez sélectionner votre nombre d'années d'expérience.");
        closeVerification();
        experienceField.focus();
        return;
    }

    const experience=parseInt(experienceField.value,10);

    if(experience===0){
        verificationConfirmed=true;
        closeVerification();
        return;
    }

    const required=[
        $('cni_number').value.trim(),
        $('cni_document').files.length,
        $('localisation_plan').files.length,
        $('photo_identite').files.length,
        $('emergency_contact_1_name').value.trim(),
        $('emergency_contact_1_phone').value.trim(),
        $('emergency_contact_2_name').value.trim(),
        $('emergency_contact_2_phone').value.trim()
    ];

    if(required.some(x=>!x)){
        alert('Veuillez compléter toutes les informations de vérification demandées.');
        return;
    }

    if(experienceInput.files.length<1){
        alert("Veuillez ajouter au moins un justificatif d'expérience.");
        return;
    }

    if(experienceInput.files.length>5){
        alert('Vous pouvez ajouter au maximum 5 justificatifs.');
        return;
    }

    verificationConfirmed=true;
    closeVerification();
});

function togglePassword(inputId,button){
    const input=$(inputId);
    const icon=button.querySelector('.eye-icon');

    if(input.type==='password'){
        input.type='text';

        icon.innerHTML='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 5.2A10.7 10.7 0 0 1 12 5c6 0 9.5 7 9.5 7a17.7 17.7 0 0 1-3.1 3.9M6.1 6.1C3.8 7.8 2.5 12 2.5 12s3.5 7 9.5 7c1.2 0 2.3-.2 3.3-.6"/>';
    }else{
        input.type='password';

        icon.innerHTML='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5" stroke-width="1.8"/>';
    }
}

initializeWorkDays();
updateExperienceState();
</script>

<style>
.field-label{
    display:block;
    font-size:11px;
    line-height:1.2;
    font-weight:700;
    color:rgb(51 65 85);
    margin-bottom:5px
}

.form-input{
    width:100%;
    padding:9px 13px;
    background:white;
    border:1px solid rgb(226 232 240);
    border-radius:11px;
    font-size:11px;
    font-weight:500;
    color:rgb(15 23 42);
    outline:none;
    transition:.2s ease
}

.form-input:focus{
    border-color:rgb(37 99 235);
    box-shadow:0 0 0 3px rgba(37,99,235,.1)
}

.form-input::placeholder{
    color:rgb(148 163 184)
}

.upload-button{
    width:100%;
    min-height:39px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:10px;
    padding:9px 13px;
    background:rgba(239,246,255,.6);
    border:1px dashed rgb(191 219 254);
    border-radius:11px;
    font-size:11px;
    font-weight:500;
    color:rgb(71 85 105);
    text-align:left;
    transition:.2s ease
}

.upload-button:hover:not(:disabled){
    background:rgb(239 246 255);
    border-color:rgb(96 165 250)
}

.upload-button:disabled{
    opacity:.5;
    cursor:not-allowed
}

.section-title{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
    font-weight:900;
    color:rgb(15 23 42)
}

.section-number{
    width:23px;
    height:23px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    border-radius:8px;
    background:rgb(239 246 255);
    color:rgb(37 99 235);
    font-size:10px;
    font-weight:900
}

#workDaySelect,#experience{
    cursor:pointer
}
</style>
@endsection