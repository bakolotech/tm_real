<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitNegociationInterval extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'type_negociation',
        'valeur',
    ];
}
