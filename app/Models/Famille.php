<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImagesEtagere;

class Famille extends Model
{
    protected  $guarded=['id'];

    public function sousCategorie()
    {
        return $this->hasMany(SousCategorie::class, 'famille_id');
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id');
    }

    public function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

    public function image_etagere() {
        return $this->hasMany(ImagesEtagere::class, 'id_famille');
    }

    public function produits(){
        return $this->hasMany(Produit::class, 'id_famille');
    }



}
