<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImagesEtagere;
use App\Models\Commande;

class Produit extends Model
{
    protected $guarded = ['id'];

    public function produitSousCategories()
    {
        return $this->hasMany(ProduitSousCategorie::class, 'produit_id');
    }

    public function sousCategorie() {
        return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }

    public function produitImages()
    {
        return $this->hasMany(ProduitImage::class, 'produit_id');
    }

    public function produitReductions(){
        return $this->hasMany(ProduitReduction::class, 'produit_id');
    }

    public function produitPaysExclu(){
        return $this->hasMany(ProduitPaysExclu::class, 'produit_id');
    }

    public function produitAttribut(){
        // $caracteristique = ProduitCaracteristiqueValeur::where('id_produit', $this->id)->get();
        // $caracteristique_final = [];
        // foreach($caracteristique as $c){
        //     $valeur = CaracteristiqueValeurs::where('id', $c->id_caracteristique_valeur)->get();
        //     $caracteristique_libelle = Caracteristique::where('id', $valeur[0]->caracteristique_id)->get();
        //     $caracteristique_final[$caracteristique_libelle[0]] = $valeur[0]->valeur;
        // }
        // // return $this->hasMany(ProduitCaracteristiqueValeur::class, 'id_produit');
        // return $caracteristique_final;
        $caracteristique = ProduitCaracteristiqueValeur::where('id_produit', $this->id)->get();
        $caracteristique_final = [];
        foreach($caracteristique as $c){
            $valeur = CaracteristiqueValeurs::where('id', $c->id_caracteristique_valeur)->get();
            if (count($valeur) > 0) {
                $caracteristique_libelle = Caracteristique::where('id', $valeur[0]->caracteristique_id)->get();
                if (count($caracteristique_libelle) > 0) {
                    $caracteristique_final[] = $valeur[0]->valeur;
                }

            }

        }
        // return $this->hasMany(ProduitCaracteristiqueValeur::class, 'id_produit');
        return $caracteristique_final;
    }

    public function produitboutiqueAttribute() {
        return $this->hasMany(BoutiqueProduitCaracteristique::class, 'id_produit');
    }

    public function image_etagere() {
        return $this->hasOne(ImagesEtagere::class, 'id_famille');
    }



    public function commandes() {
        return $this->belongsToMany(Commande::class);
    }

    public function produitAchatMultiple() {
        return $this->hasMany(ProduitAchatMultiple::class, 'produit_id');
    }

    public function produitOptionRetour() {
        return $this->hasMany(ProduitOptionsRetour::class, 'produit_id');
    }

}
