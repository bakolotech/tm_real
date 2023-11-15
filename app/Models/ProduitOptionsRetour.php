<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitOptionsRetour extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'type_retour',
        'nombre_jours',
        'payee_par'
    ];
}
