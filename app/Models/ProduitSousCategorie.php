<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitSousCategorie extends Model
{
    protected $guarded = ['id'];

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

}
