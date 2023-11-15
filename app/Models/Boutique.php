<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $fillable = [
        'libelle',
        'type_boutique',
        'upc',
        'fabriquant',
        'proprietaire_marque_depose',
        'fabriquant_proprietaire',
        'num_matricule',
        'boutique_pays',
        'code_postal',
        'province',
        'ville',
        'adresse',
        'complement_adresse',
        'contact_principla_prenom',
        'contact_principal_prenom2',
        'contact_principal_nomfamille',
        'description',
        'id_marchand',
        'fiche_circuit'
    ];
}
