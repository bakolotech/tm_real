<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marchand extends Model
{
    // use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'pays_citoyennete',
        'date_naisse',
        'copie_piece_identite',
        'date_expiration',
        'pays_emission',
        'numero_tel',
        'id_utilisateur',
        'identite_document',
        'verifie',
        'representant',
        'beneficiaire',
        'confirmerEngagement',
    ];
}
