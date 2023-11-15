<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitAchatMultiple extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'nombre_produits',
        'pourcentage',
    ];
}
