<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayonCaracteristiqueValeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'rayon_id',
        'caracteristique_id',
        'valeur_id',
    ];
}
