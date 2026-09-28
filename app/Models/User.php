<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS PERSONNELLES
        |--------------------------------------------------------------------------
        */
        'nom',
        'prenom',
        'email',
        'telephone',
        'ville',
        'quartier',
        'sexe',
        'age',

        /*
        |--------------------------------------------------------------------------
        | COMPTE
        |--------------------------------------------------------------------------
        */
        'role',
        'password',

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS PROFESSIONNELLES
        |--------------------------------------------------------------------------
        */
        'expertise',
        'experience',
        'work_days',
        'cv',

        /*
        |--------------------------------------------------------------------------
        | VÉRIFICATION
        |--------------------------------------------------------------------------
        */
        'cni_number',
        'cni_document',
        'localisation_plan',
        'photo_identite',
        'experience_documents',

        /*
        |--------------------------------------------------------------------------
        | CONTACTS D'URGENCE
        |--------------------------------------------------------------------------
        */
        'emergency_contact_1_name',
        'emergency_contact_1_phone',
        'emergency_contact_2_name',
        'emergency_contact_2_phone',

        /*
        |--------------------------------------------------------------------------
        | STATUT
        |--------------------------------------------------------------------------
        */
        'verification_status',
        'est_verifie',

        /*
        |--------------------------------------------------------------------------
        | PHOTOS
        |--------------------------------------------------------------------------
        */
        'avatar',
        'cover_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',

        // Documents sensibles
        'cni_number',
        'cni_document',
        'localisation_plan',
        'photo_identite',
        'experience_documents',

        'emergency_contact_1_name',
        'emergency_contact_1_phone',
        'emergency_contact_2_name',
        'emergency_contact_2_phone',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        'age' => 'integer',
        'experience' => 'integer',

        'est_verifie' => 'boolean',

        'experience_documents' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function artisanProfile()
    {
        return $this->hasOne(ArtisanProfile::class);
    }

    public function interventionsAsClient()
    {
        return $this->hasMany(
            Intervention::class,
            'client_id'
        );
    }

    public function interventionsAsWorker()
    {
        return $this->hasMany(
            Intervention::class,
            'travailleur_id'
        );
    }

    public function favorites()
    {
        return $this->belongsToMany(
            User::class,
            'favorites',
            'client_id',
            'travailleur_id'
        )->withTimestamps();
    }
}