<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'travailleur_id',
        'category_id',
        'statut',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function travailleur()
    {
        return $this->belongsTo(User::class, 'travailleur_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
