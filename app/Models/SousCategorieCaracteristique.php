<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCategorieCaracteristique extends Model
{
    protected $guarded = ['id'];
    public function caracteristique()
    {
        return $this->belongsTo(Caracteristique::class, 'caracteristique_id');
    }
    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }
}
