<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'intervention_id',
        'client_id',
        'travailleur_id',
        'rating',
        'comment',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function travailleur()
    {
        return $this->belongsTo(User::class, 'travailleur_id');
    }

    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }
}
