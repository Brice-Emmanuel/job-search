<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'icone',
        'nombre_professionnels',
    ];

    public function artisanProfiles()
    {
        return $this->hasMany(ArtisanProfile::class);
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}
