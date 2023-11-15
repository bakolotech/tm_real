<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecapCommande extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id',
        'id_addresse_livraison',
        'id_adresse_facturation',
        'facturation_sous_total',
        'totaf_facturation',
        'ref_commande',
        'date_commande',
        'mode_payement',
        'nombre_article',
        'status_commande',
        'type_commande',
        'ref_commande_principal',
        'notified'
    ];
}
