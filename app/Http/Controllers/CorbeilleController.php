<?php

namespace App\Http\Controllers;

use App\Models\Corbeille;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CorbeilleController extends Controller
{
    /**
     * Display a lisswting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corbeille  $corbeille
     * @return \Illuminate\Http\Response
     */
    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);
        return $interval->format($differenceFormat);
    }

        public function show(Corbeille $corbeille)
    {
        // $corbeille = Produit::where('deleted', 1)->get(); ->where('c', $_SESSION['boutique_marchand_id'])
        $dt = Carbon::now();
        $tab = [];

        $corbeille = DB::table('produits')
                        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                        ->join('corbeilles', 'corbeilles.produit_id', '=', 'produits.id')
                        ->select('produits.*', 'rayons.libelle as r_lib', 'corbeilles.date_mise_en_corbeille', 'corbeilles.id as corbeille_id')->where([['produits.deleted','=', 1], ['corbeilles.id', '<>', 0], ['produits.boutique_id', '=', $_SESSION['boutique_marchand_id']]])->get();

        foreach ($corbeille as  $c) {
            $date1 = date('Y-m-d'); // or your date as well
            $diff = $this->dateDifference($date1, $c->date_mise_en_corbeille);
            $c->date_mise_en_corbeille =30 - $diff;
            if ($c->date_mise_en_corbeille <= 0) {
                $corbeille_data = Corbeille::where('id', $c->corbeille_id)->get();
                $corbeil_id = $corbeille_data[0];
                $corbeil_id->delete();
            }else {
                $tab[] = $c;
            }
        }
        return $tab;
    }

    // function qui enleve supprime le produit definitivement
    public function removeProductBasket($id) {
        $basket_item = Corbeille::find($id);
        $basket_item->deleted = 1;
        // $basket_item->save();
        $basket_item->delete();
        // $basket_item->update(['deleted' => '1']);
        return $basket_item;
    }

    public function getNumberCorbeil() {
        $corbeille = DB::table('produits')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('corbeilles', 'corbeilles.produit_id', '=', 'produits.id')
        ->select('produits.*', 'rayons.libelle as r_lib', 'corbeilles.date_mise_en_corbeille', 'corbeilles.id as corbeille_id')->where([['produits.deleted','=', 1], ['corbeilles.deleted', '=', 0], ['produits.boutique_id', '=', $_SESSION['boutique_marchand_id']]])->get();
        return $corbeille->count();
    }

    public function vider(Request $request) {
        $corbeille = DB::table('produits')
                        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                        ->join('corbeilles', 'corbeilles.produit_id', '=', 'produits.id')
                        ->select('produits.*', 'rayons.libelle as r_lib', 'corbeilles.date_mise_en_corbeille', 'corbeilles.id as corbeille_id')->where([['produits.deleted','=', 1], ['corbeilles.id', '<>', 0], ['produits.boutique_id', '=', $_SESSION['boutique_marchand_id']]])->get();


        foreach ($corbeille as $key => $corb) {
            $corbeille_produit = Corbeille::find($corb->corbeille_id);
            $corbeille_produit->delete();
        }

        return 'success';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corbeille  $corbeille
     * @return \Illuminate\Http\Response
     */
    public function edit(Corbeille $corbeille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corbeille  $corbeille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corbeille $corbeille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corbeille  $corbeille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corbeille $corbeille)
    {
        //
    }
}
