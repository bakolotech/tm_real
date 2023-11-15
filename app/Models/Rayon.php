<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rayon extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        self::retrieved(function ($model) {
            if (is_null($model->slug)) {
                $model->slug = Str::slug(self::text2($model->libelle));
                $model->save();
            }
        });
    }

    public function univer()
    {
        return $this->belongsTo(Univer::class, 'univer_id');
    }

    public function familles()
    {
        return $this->hasMany(Famille::class, 'rayon_id');
    }

    public function caracteristiques() {
        return $this->hasMany(RayonCaracteristiques::class, 'rayon_id');
        // $caracteristique = DB::select('rayons')
        //                         ->join('rayons_caracteristiques', 'rayons.id', '=', 'rayons_caracteristiques.rayon_id')
        //                         ->join('caracteristiques', 'caracteristiques.id', '=', 'rayons_caracteristiques.caracterisque.id')
        //                         ->where('rayon_id', $_GET['id']);
    }

    public function sousCategories()
    {
        return SousCategorie::whereIn('famille_id', function ($query){
            $query->select('id')->from((new Famille)->getTable())->where([['rayon_id', $this->id], ['deleted', 0], ['locked', 0], ['archived', 0]]);
        })->whereNotNull('image')->where([['locked', 0], ['deleted', 0], ['archived', 0]])->get()->shuffle();
    }

    /**
     * @return string|string[]
     */
    public function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

    public function getLibelle()
    {
        return $this->text($this->libelle);
    }


    /**
     * @return string
     */
    public function getGEtagereLink()
    {
        return asset('storage/images/rayons/'. $this->grande_etagere);
    }

    /**
     * @return string
     */
    public function getPEtagereLink()
    {
        return asset('storage/images/rayons/'. $this->petite_etagere);
    }

    /**
     * @return string
     */
    public function getIconLink()
    {
        return asset('storage/images/rayons/'. $this->logo);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getOne()
    {
        return Rayon::with(
            [
                'familles' => function($req){
                    return $req->with(
                        [
                            'produits'
                        ]
                    )
                    ->orderBy('default_categorie', 'DESC')
                    ->where([['locked', 0], ['deleted', 0]]);
                },
                'univer'
            ]
        );
    }

    public function getShowLink()
    {
        return url('rayon/'. $this->id .'/'. $this->slug);
    }

}
