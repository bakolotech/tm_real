<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCaracteristiqueValeur extends Model
{
    protected $fillable =  [ 'id_produit', 'id_caracteristique_valeur'];
}
