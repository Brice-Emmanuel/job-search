@extends('layouts.app')

@section('content')
<div class="space-y-4 max-w-7xl mx-auto">
    <div id="alert-box" class="hidden text-sm font-semibold px-4 py-3 rounded-xl border"></div>
    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

    <div id="cover-wrapper" class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 rounded-3xl p-5 md:p-6 text-white shadow-xl overflow-hidden flex flex-col md:flex-row items-center justify-between gap-4" @if($user->cover_photo) style="background-image:linear-gradient(to right,rgba(30,58,138,.88),rgba(30,58,138,.45)),url('{{ Storage::url($user->cover_photo) }}');background-size:cover;background-position:center;" @endif>
        <button type="button" onclick="document.getElementById('coverInput').click()" title="Changer la photo de couverture" class="absolute top-3 right-3 w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-md rounded-xl flex items-center justify-center text-white transition shadow-lg border border-white/30">
            <i class="fa-solid fa-camera text-sm"></i>
        </button>
        <input type="file" id="coverInput" accept="image/*" capture="environment" class="hidden" onchange="uploadFile(this,'cover_photo')">

        <div class="flex flex-col md:flex-row items-center gap-4 text-center md:text-left z-10">
            <div class="relative">
                <div class="w-28 h-28 md:w-32 md:h-32 rounded-full p-1 bg-white/30 backdrop-blur-md shadow-2xl">
                    <img id="avatar-img" src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->prenom . ' ' . $user->nom) . '&background=1d4ed8&color=fff&size=256' }}" alt="{{ $user->prenom }} {{ $user->nom }}" class="w-full h-full object-cover rounded-full">
                </div>
                <button type="button" onclick="document.getElementById('avatarInput').click()" title="Changer la photo de profil" class="absolute bottom-1 right-1 w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-xl flex items-center justify-center border-2 border-white shadow-lg transition">
                    <i class="fa-solid fa-camera text-xs"></i>
                </button>
                <input type="file" id="avatarInput" accept="image/*" capture="user" class="hidden" onchange="uploadFile(this,'avatar')">
            </div>

            <div class="space-y-1">
                <span class="text-[10px] uppercase tracking-widest font-extrabold text-blue-200 bg-black/10 px-3 py-1 rounded-full inline-block">Espace travailleur</span>
                <h1 class="text-2xl md:text-3xl font-black tracking-tight text-white"><span id="display-fullname">{{ $user->prenom }} {{ $user->nom }}</span></h1>
                <p class="text-blue-100 text-sm font-medium flex items-center justify-center md:justify-start gap-1.5">
                    <i class="fa-solid fa-location-dot"></i><span id="display-location">{{ $user->quartier }}, {{ $user->ville }}</span>
                </p>
                <div class="pt-1">
                    <span class="inline-flex items-center gap-1.5 bg-emerald-500/20 border border-emerald-400/30 text-emerald-200 text-xs font-bold px-3 py-1 rounded-full">
                        <i class="fa-solid fa-circle-check text-[10px]"></i>Compte vérifié
                    </span>
                </div>
            </div>
        </div>

        <div class="z-10">
            <button type="button" id="edit-toggle-btn" onclick="toggleEditMode()" class="bg-white hover:bg-blue-50 text-blue-900 font-bold px-5 py-3 rounded-xl shadow-lg transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-user-pen text-xs"></i><span id="edit-toggle-label">Modifier mon profil</span>
            </button>
        </div>
    </div>

    <div class="bg-slate-900 text-white rounded-3xl p-4 md:p-6 shadow-2xl border border-slate-800">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500 text-slate-900 rounded-xl flex items-center justify-center text-lg font-bold"><i class="fa-solid fa-id-badge"></i></div>
                <div>
                    <span class="text-[10px] text-amber-400 font-black uppercase tracking-widest block">Profil professionnel</span>
                    <h2 class="text-xl font-bold tracking-tight">Mes informations</h2>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" id="cancel-info-btn" onclick="cancelEdit()" class="hidden bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition"><i class="fa-solid fa-xmark mr-1"></i>Annuler</button>
                <button type="button" id="save-info-btn" onclick="saveInfo()" class="hidden bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-md"><i class="fa-solid fa-check mr-1"></i>Enregistrer</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="info-card">
                <div class="info-icon bg-blue-600/20 text-blue-400"><i class="fa-solid fa-user"></i></div>
                <div><span class="info-label">Prénom</span><p id="display-prenom" class="display-value">{{ $user->prenom }}</p><input id="input-prenom" type="text" value="{{ $user->prenom }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-blue-600/20 text-blue-400"><i class="fa-solid fa-user"></i></div>
                <div><span class="info-label">Nom</span><p id="display-nom" class="display-value">{{ $user->nom }}</p><input id="input-nom" type="text" value="{{ $user->nom }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-blue-600/20 text-blue-400"><i class="fa-solid fa-envelope"></i></div>
                <div><span class="info-label">E-mail</span><p id="display-email" class="display-value truncate">{{ $user->email }}</p><input id="input-email" type="email" value="{{ $user->email }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-emerald-600/20 text-emerald-400"><i class="fa-solid fa-phone"></i></div>
                <div><span class="info-label">Téléphone</span><p id="display-telephone" class="display-value">{{ $user->telephone }}</p><input id="input-telephone" type="text" value="{{ $user->telephone }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-rose-600/20 text-rose-400"><i class="fa-solid fa-city"></i></div>
                <div><span class="info-label">Ville</span><p id="display-ville" class="display-value">{{ $user->ville }}</p><input id="input-ville" type="text" value="{{ $user->ville }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-rose-600/20 text-rose-400"><i class="fa-solid fa-map-location-dot"></i></div>
                <div><span class="info-label">Quartier</span><p id="display-quartier" class="display-value">{{ $user->quartier }}</p><input id="input-quartier" type="text" value="{{ $user->quartier }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-purple-600/20 text-purple-400"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                <div><span class="info-label">Métier</span><p id="display-expertise" class="display-value">{{ $user->expertise ?? 'Non renseigné' }}</p><input id="input-expertise" type="text" value="{{ $user->expertise }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-amber-600/20 text-amber-400"><i class="fa-solid fa-briefcase"></i></div>
                <div><span class="info-label">Expérience</span><p id="display-experience" class="display-value">{{ $user->experience !== null ? $user->experience . ' an(s)' : 'Non renseigné' }}</p><input id="input-experience" type="number" min="0" max="80" value="{{ $user->experience }}" class="edit-input hidden"></div>
            </div>

            <div class="info-card lg:col-span-2">
                <div class="info-icon bg-teal-600/20 text-teal-400"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="w-full">
                    <span class="info-label">Jours de travail</span>
                    <p id="display-work_days" class="display-value">{{ $user->work_days ?? 'Non renseigné' }}</p>
                    <div id="work-days-editor" class="hidden mt-2">
                        <div class="flex gap-2">
                            <select id="work-day-select" class="edit-input flex-1">
                                <option value="">Choisir un jour</option>
                                <option value="Lundi">Lundi</option><option value="Mardi">Mardi</option><option value="Mercredi">Mercredi</option><option value="Jeudi">Jeudi</option><option value="Vendredi">Vendredi</option><option value="Samedi">Samedi</option><option value="Dimanche">Dimanche</option>
                            </select>
                            <button type="button" id="add-work-day" onclick="addWorkDay()" class="hidden w-11 h-11 shrink-0 rounded-xl bg-blue-600 hover:bg-blue-500 text-white items-center justify-center transition" title="Ajouter ce jour"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div id="selected-days" class="flex flex-wrap gap-2 mt-2"></div>
                        <input type="hidden" id="input-work_days" value="{{ $user->work_days }}">
                    </div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-indigo-600/20 text-indigo-400"><i class="fa-solid fa-file-pdf"></i></div>
                <div class="min-w-0">
                    <span class="info-label">CV</span>
                    <a id="cv-link" href="{{ $user->cv ? Storage::url($user->cv) : '#' }}" target="_blank" class="text-sm font-semibold mt-0.5 block truncate {{ $user->cv ? 'text-blue-400 hover:text-blue-300' : 'text-white pointer-events-none' }}">{{ $user->cv ? 'Voir le document' : 'Non renseigné' }}</a>
                    <button type="button" onclick="document.getElementById('cvInput').click()" class="text-xs text-slate-400 hover:text-white mt-1.5 flex items-center gap-1.5"><i class="fa-solid fa-upload"></i>Changer le CV</button>
                    <input type="file" id="cvInput" accept=".pdf,.doc,.docx" class="hidden" onchange="uploadFile(this,'cv')">
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon bg-green-600/20 text-green-400"><i class="fa-solid fa-user-shield"></i></div>
                <div>
                    <span class="info-label">Compte</span>
                    <p class="text-sm font-semibold text-white mt-0.5">Travailleur vérifié</p>
                    <span class="inline-flex mt-1 text-[10px] font-bold text-emerald-400"><i class="fa-solid fa-circle-check mr-1"></i>Profil actif</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="stat-card">
            <div class="flex items-center justify-between"><span class="stat-label">Missions acceptées</span><div class="stat-icon bg-blue-500/10 text-blue-400"><i class="fa-solid fa-briefcase text-xs"></i></div></div>
            <div class="my-2"><span class="text-4xl font-black text-white">12</span></div>
            <p class="stat-description">Total de missions réalisées</p>
        </div>
        <div class="stat-card">
            <div class="flex items-center justify-between"><span class="stat-label">Avis reçus</span><div class="stat-icon bg-emerald-500/10 text-emerald-400"><i class="fa-solid fa-star text-xs"></i></div></div>
            <div class="my-2"><span class="text-4xl font-black text-white">4.8</span></div>
            <p class="stat-description">Note moyenne sur 5</p>
        </div>
        <div class="stat-card">
            <div class="flex items-center justify-between"><span class="stat-label">Interventions en cours</span><div class="stat-icon bg-amber-500/10 text-amber-400"><i class="fa-solid fa-clock-rotate-left text-xs"></i></div></div>
            <div class="my-2"><span class="text-4xl font-black text-white">2</span></div>
            <p class="stat-description">Demandes en attente de traitement</p>
        </div>
    </div>
</div>

<style>
.info-card{background:rgba(30,41,59,.8);border:1px solid rgba(71,85,105,.6);padding:1rem;border-radius:1rem;display:flex;align-items:flex-start;gap:.85rem;min-width:0}
.info-icon{width:2.5rem;height:2.5rem;min-width:2.5rem;border-radius:.75rem;display:flex;align-items:center;justify-content:center}
.info-label{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#94a3b8;display:block}
.display-value{color:#fff;font-size:.875rem;font-weight:600;margin-top:.15rem}
.edit-input{width:100%;background:#334155;color:#fff;font-size:.875rem;border-radius:.65rem;padding:.6rem .7rem;border:1px solid #475569;outline:none}
.edit-input:focus{border-color:#3b82f6;box-shadow:0 0 0 2px rgba(59,130,246,.2)}
.day-chip{display:inline-flex;align-items:center;gap:.4rem;background:rgba(20,184,166,.15);color:#5eead4;border:1px solid rgba(45,212,191,.25);border-radius:.7rem;padding:.35rem .55rem;font-size:.75rem;font-weight:700}
.day-chip button{width:18px;height:18px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#99f6e4}
.day-chip button:hover{background:rgba(255,255,255,.1)}
.stat-card{background:#0f172a;color:#fff;border-radius:1.5rem;padding:1.25rem;box-shadow:0 10px 25px rgba(15,23,42,.15);border:1px solid #1e293b}
.stat-label{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:#94a3b8}
.stat-icon{width:2rem;height:2rem;border-radius:.7rem;display:flex;align-items:center;justify-content:center}
.stat-description{font-size:.75rem;color:#94a3b8}
@media(max-width:640px){.info-card{padding:.85rem}}
</style>

<script>
const csrfToken=document.getElementById('csrf-token').value;
const updateUrl="{{ route('worker.profile.update') }}";
let editMode=false;
const editableFields=['prenom','nom','email','telephone','ville','quartier','expertise','experience'];

function showAlert(message,isError=false){
    const box=document.getElementById('alert-box');
    box.textContent=message;
    box.classList.remove('hidden','bg-emerald-50','border-emerald-200','text-emerald-700','bg-red-50','border-red-200','text-red-700');
    box.classList.add(...(isError?['bg-red-50','border-red-200','text-red-700']:['bg-emerald-50','border-emerald-200','text-emerald-700']));
    setTimeout(()=>box.classList.add('hidden'),4000);
}

function uploadFile(input,fieldName){
    if(!input.files?.[0]) return;
    const formData=new FormData();
    formData.append('_method','PUT');
    formData.append(fieldName,input.files[0]);
    fetch(updateUrl,{method:'POST',headers:{'X-CSRF-TOKEN':csrfToken,'Accept':'application/json'},body:formData})
    .then(async response=>{
        const data=await response.json();
        if(!response.ok||!data.success) throw new Error(data.message||"Erreur lors de l’envoi.");
        return data;
    })
    .then(data=>{
        if(fieldName==='avatar'&&data.user.avatar_url) document.getElementById('avatar-img').src=data.user.avatar_url;
        if(fieldName==='cover_photo'&&data.user.cover_url){
            const wrapper=document.getElementById('cover-wrapper');
            wrapper.style.backgroundImage=`linear-gradient(to right,rgba(30,58,138,.88),rgba(30,58,138,.45)),url('${data.user.cover_url}')`;
            wrapper.style.backgroundSize='cover';
            wrapper.style.backgroundPosition='center';
        }
        if(fieldName==='cv'&&data.user.cv_url){
            const link=document.getElementById('cv-link');
            link.href=data.user.cv_url;
            link.textContent='Voir le document';
            link.classList.remove('text-white','pointer-events-none');
            link.classList.add('text-blue-400','hover:text-blue-300');
        }
        showAlert(data.message||'Modification enregistrée.');
    })
    .catch(error=>showAlert(error.message||"Erreur lors de l'envoi.",true));
}

function toggleEditMode(){
    editMode=!editMode;
    editMode?enterEditMode():cancelEdit();
}

function enterEditMode(){
    editMode=true;
    editableFields.forEach(field=>{
        document.getElementById('display-'+field)?.classList.add('hidden');
        document.getElementById('input-'+field)?.classList.remove('hidden');
    });
    document.getElementById('display-work_days').classList.add('hidden');
    document.getElementById('work-days-editor').classList.remove('hidden');
    document.getElementById('save-info-btn').classList.remove('hidden');
    document.getElementById('cancel-info-btn').classList.remove('hidden');
    document.getElementById('edit-toggle-label').textContent='Annuler';
    document.querySelector('#edit-toggle-btn i').className='fa-solid fa-xmark text-xs';
    initializeWorkDays();
}

function cancelEdit(){
    editMode=false;
    editableFields.forEach(field=>{
        document.getElementById('display-'+field)?.classList.remove('hidden');
        document.getElementById('input-'+field)?.classList.add('hidden');
    });
    document.getElementById('display-work_days').classList.remove('hidden');
    document.getElementById('work-days-editor').classList.add('hidden');
    document.getElementById('save-info-btn').classList.add('hidden');
    document.getElementById('cancel-info-btn').classList.add('hidden');
    document.getElementById('edit-toggle-label').textContent='Modifier mon profil';
    document.querySelector('#edit-toggle-btn i').className='fa-solid fa-user-pen text-xs';
    restoreOriginalValues();
}

const originalValues={};
editableFields.forEach(field=>{
    const input=document.getElementById('input-'+field);
    if(input) originalValues[field]=input.value;
});

function restoreOriginalValues(){
    editableFields.forEach(field=>{
        const input=document.getElementById('input-'+field);
        if(input&&originalValues[field]!==undefined) input.value=originalValues[field];
    });
    initializeWorkDays();
}

const days=['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
const selectedWorkDays=[];
const workDaySelect=document.getElementById('work-day-select');
const addWorkDayButton=document.getElementById('add-work-day');

function initializeWorkDays(){
    selectedWorkDays.length=0;
    const currentValue=document.getElementById('input-work_days').value.trim();
    if(currentValue){
        currentValue.split(',').forEach(value=>{
            const clean=value.trim();
            const found=days.find(day=>day.toLowerCase()===clean.toLowerCase());
            if(found&&!selectedWorkDays.includes(found)) selectedWorkDays.push(found);
        });
    }
    renderWorkDays();
}

workDaySelect.addEventListener('change',function(){
    if(this.value){
        addWorkDayButton.classList.remove('hidden');
        addWorkDayButton.classList.add('flex');
    }else{
        addWorkDayButton.classList.add('hidden');
        addWorkDayButton.classList.remove('flex');
    }
});

function addWorkDay(){
    const day=workDaySelect.value;
    if(!day) return;
    if(selectedWorkDays.includes(day)){
        showAlert('Ce jour est déjà sélectionné.',true);
        return;
    }
    selectedWorkDays.push(day);
    workDaySelect.value='';
    addWorkDayButton.classList.add('hidden');
    addWorkDayButton.classList.remove('flex');
    renderWorkDays();
}

function removeWorkDay(day){
    const index=selectedWorkDays.indexOf(day);
    if(index!==-1) selectedWorkDays.splice(index,1);
    renderWorkDays();
}

function renderWorkDays(){
    const container=document.getElementById('selected-days');
    const hiddenInput=document.getElementById('input-work_days');
    container.innerHTML='';
    selectedWorkDays.forEach(day=>{
        const chip=document.createElement('span');
        chip.className='day-chip';
        chip.innerHTML=`<i class="fa-solid fa-calendar-day text-[10px]"></i>${day}<button type="button" onclick="removeWorkDay('${day}')" title="Retirer ${day}"><i class="fa-solid fa-xmark text-[9px]"></i></button>`;
        container.appendChild(chip);
    });
    hiddenInput.value=selectedWorkDays.join(', ');
}

function saveInfo(){
    const experience=parseInt(document.getElementById('input-experience').value,10);
    if(isNaN(experience)||experience<0){
        showAlert("L'expérience doit être supérieure ou égale à 0.",true);
        return;
    }
    if(!selectedWorkDays.length){
        showAlert('Veuillez sélectionner au moins un jour de travail.',true);
        return;
    }

    const formData=new FormData();
    formData.append('_method','PUT');
    editableFields.forEach(field=>{
        const input=document.getElementById('input-'+field);
        if(input) formData.append(field,input.value.trim());
    });
    formData.set('work_days',selectedWorkDays.join(', '));

    const saveButton=document.getElementById('save-info-btn');
    saveButton.disabled=true;
    saveButton.innerHTML='<i class="fa-solid fa-spinner fa-spin mr-1"></i> Enregistrement...';

    fetch(updateUrl,{method:'POST',headers:{'X-CSRF-TOKEN':csrfToken,'Accept':'application/json'},body:formData})
    .then(async response=>{
        const data=await response.json();
        if(!response.ok||!data.success) throw new Error(data.message||"Erreur lors de l’enregistrement.");
        return data;
    })
    .then(data=>{
        editableFields.forEach(field=>{
            const input=document.getElementById('input-'+field);
            const display=document.getElementById('display-'+field);
            if(!input||!display) return;
            const value=data.user[field]??input.value;
            input.value=value;
            display.textContent=field==='experience'?(value!==null&&value!==''?value+' an(s)':'Non renseigné'):(value||'Non renseigné');
            originalValues[field]=value;
        });

        const savedWorkDays=data.user.work_days||selectedWorkDays.join(', ');
        document.getElementById('input-work_days').value=savedWorkDays;
        document.getElementById('display-work_days').textContent=savedWorkDays||'Non renseigné';
        originalValues.work_days=savedWorkDays;
        document.getElementById('display-fullname').textContent=`${data.user.prenom} ${data.user.nom}`;
        document.getElementById('display-location').textContent=`${data.user.quartier}, ${data.user.ville}`;
        cancelEdit();
        showAlert(data.message||'Votre profil a été modifié avec succès.');
    })
    .catch(error=>showAlert(error.message||"Erreur lors de l'enregistrement.",true))
    .finally(()=>{
        saveButton.disabled=false;
        saveButton.innerHTML='<i class="fa-solid fa-check mr-1"></i> Enregistrer';
    });
}

initializeWorkDays();
</script>
@endsection