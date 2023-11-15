<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    protected $guarded = ['id'];


    public function caracteristiquesSousCategorie()
    {
        return $this->hasMany(SousCategorieCaracteristique::class, 'sous_categorie_id');
    }

    public function valeurs() {
        return $this->hasMany(CaracteristiqueValeurs::class, 'caracteristique_id');
    }

}
