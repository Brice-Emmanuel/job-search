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
        'nom',
        'prenom',
        'email',
        'telephone',
        'ville',
        'quartier',
        'sexe',
        'role',
        'password',
        'est_verifie',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'est_verifie' => 'boolean',
    ];

    public function artisanProfile()
    {
        return $this->hasOne(ArtisanProfile::class);
    }

    public function interventionsAsClient()
    {
        return $this->hasMany(Intervention::class, 'client_id');
    }

    public function interventionsAsWorker()
    {
        return $this->hasMany(Intervention::class, 'travailleur_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'client_id', 'travailleur_id')->withTimestamps();
    }
}
