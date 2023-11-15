<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class Univer extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        self::retrieved(function ($model) {
            if (is_null($model->slug)) {
                $model->slug = Str::slug($model->libelle);
                $model->save();
            }
        });
    }

    public function rayons()
    {
        return $this->hasMany(Rayon::class, 'univer_id');
    }

    public static function possibles($position = [1,2])
    {
        return Univer::where([['locked', 0], ['deleted', 0]])
        ->orderBy('affichage_order', 'asc')
        ->whereIn('ranger', $position)->get();
    }

    public static function all_univers() {
        return Univer::all();
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return string
     */
    public function getMiniLink()
    {
        return asset('storage/images/univers/'. $this->mini);
    }

    /**
     * @return string
     */
    public function getIconLink()
    {
        return asset('storage/images/univers/'. $this->logo);
    }

    /**
     * @return string
     */
    public function getIconHoverLink()
    {
        return asset('storage/images/univers/'. $this->logo_hover);
    }

    /**
     * @return string
     */
    public function getBackgroundLink()
    {
        return asset('storage/images/univers/'. $this->background);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getOne()
    {
        return Univer::with(
            [
                'rayons' => function($req){
                    return $req->where([['locked', 0], ['deleted', 0]]);
                }
            ]
        );
    }

    public static function getById($id) {
        $univers = Univer::where('id', $id)->with('rayons')->get();
        return $univers;
    }

    public static function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

    public function backgroundPath()
    {
        return asset('storage/images/univers/'. $this->background);
    }

    /**
     * @return Builder
     */
    public static function occation()
    {
        /*
         return Univer::with(
            [
                'rayons' => function($req){
                    $req->with(
                        [
                            'produits' => function($req){
                                $req->where([['locked', 0], ['deleted', 0]]);
                            }
                        ]
                    );
                }
            ]
        )->whereIn('id', function ($req){
            $req->select('univer_id')->from((new Rayon())->getTable())->whereIn('id', function ($req2){
                $req2->select('rayon_id')->from();
            });
        })->where([['locked', 0], ['deleted', 0]]);
        */
    }
}
