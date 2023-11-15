<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    protected $guarded=['id'];



    /**
     * @return mixed
     */
    public static function possibles()
    {
        return SousCategorie::where([['locked', 0], ['deleted', 0]])->get();
    }

    public function sousCategorieCaracteristiques()
    {
        return $this->hasMany(SousCategorieCaracteristique::class, 'sous_categorie_id');
    }

    public function famille()
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function sousCategorieProduits()
    {
        return $this->hasMany(ProduitSousCategorie::class, 'sous_categorie_id');
    }

    public function getMaquetteLink()
    {
        return asset('storage/images/sous_categorie/'. $this->image);
    }

    public static function laissezNousDeviner()
    {
        return SousCategorie::with(
            [
                'sousCategorieProduits' => function($query){
                    return $query->with(
                        [
                            'produit' => function($query){
                                return $query->where([['locked', 0], ['deleted', 0]]);
                            }
                        ]
                    )->where([['locked', 0], ['deleted', 0]]);
                }
            ]
        )->whereIn('id', function ($req){
            $req->select('sous_categorie_id')->from((new ProduitSousCategorie())->getTable())
                ->where([['locked', 0], ['deleted', 0]]);
        })->where([['locked', 0], ['deleted', 0]])->get();
    }

    public function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

}
