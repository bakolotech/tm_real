<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\BoutiqueProduitCaracteristique;
use App\Models\BoutiqueProduitCarValeur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CaracteristiqueController extends Controller
{

    public function __construct()
    {
        $this->middleware('is-admin')->only(['create', 'store', 'edit', 'update', 'delete']);
    }

    /**
     * Display a listing of the resource.
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
        $data = [

        ];
        return response()->view('back.app-modules.caracteristique.caracteristique-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request){

        //dd($request);
        try {
            $request->validate(
                [
                    "type_caracteristique" => ["required", 'string', Rule::in(['affichage', 'parametre', 'vente'])],
                    "demander_valeur" => ['integer', 'required', Rule::in(['0', '1'])],
                    "required_value" => ['nullable', "required_if:demander_valeur,==,'1'", Rule::in(['0', '1'])],
                    "type_valeur" => ['nullable', "required_if:required_value,==,'1'", Rule::in(['number', 'text', 'bool', 'date', 'time'])],
                    "libelle" => ["string", 'required', Rule::unique('caracteristiques', 'libelle')->where('deleted', 0)],
                    "description" => ['string', 'nullable', 'max:1000'],
                    "icon" => ['max:1000', 'nullable', 'mimes:jpeg,jpg,png,gif,svg']
                ]
            );
        }
        catch (\PDOException $exception) {
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

            //dd($request);

        try {
            $icon = self::storeFile($request, 'icon', 'caracteristique_path', 'icones');

            if (!is_null(self::security($request['type_valeur']))) {
                $typeValeur = self::security($request['type_valeur']);
            }
            else $typeValeur = null;

            $caracteristique =  Caracteristique::create(
                [
                    "libelle" => self::security($request["libelle"]),
                    "demander_valeur" => self::security($request["demander_valeur"]),
                    "type_caracteristique" => self::security($request["type_caracteristique"]),
                    "type_valeur" => $typeValeur,
                    "description" => self::security($request["description"]),
                    "icone" => $icon,
                    "required_value" => self::security($request["required_value"]),
                ]
            );
            if ($caracteristique instanceof Caracteristique) {
                return back()->with('success-message', "La caractéristique ". $this->text($caracteristique->libelle) ." enrégistré avec succès");
            }
            else{
                return back()->with('error-message', "Une erreur s'est produite réessayer plutard");
            }
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

    }

    public function saveCaracteristiquebyClient(Request $request) {

       $caracteristique = BoutiqueProduitCaracteristique::create([
            'id_boutique' => $_SESSION['boutique_marchand_id'],
            'libelle' => $request->libelle,
        ]);

        $caracteristique_id =  $caracteristique->id;

        for ($i=0; $i < count($request->caracteristique); $i++) {
            // $caracteristique_valeur = DB::insert('insert into tm_caracteristique_valeurs ( caracteristique_id, valeur) values (?, ?)', [$caracteristique_id, $request->caracteristique[$i]]);
            $caracteristique_valeurs = BoutiqueProduitCarValeur::create([
                'idBoutiqueCarValeur' => $caracteristique_id,
                'valeur' => $request->caracteristique[$i],
            ]);
        }

        $caracteristique_instance = BoutiqueProduitCaracteristique::where('id', $caracteristique_id)->with('boutiqueProduitCaracteristique')->get();

        return $caracteristique_instance;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function show(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caracteristique $caracteristique)
    {
        //
    }

    public function caracteristique_supplementaire($id) {
        $caracteristique_supp = DB::table('produit_caracteristiques')
        ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
        ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
        ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
        ->where('produit_caracteristiques.produit_id', $id)
        ->where('boutique_produit_caracteristiques.libelle', 'Taille')
        ->select('boutique_produit_car_valeurs.valeur')
        ->get();

        return $caracteristique_supp;
    }

    // insersion des caracteristiques et valeur correspondants par rayon ou categorie
    public function getCaractisqueData(Request $request) {
        foreach($request->caracteristique_values as $caracteristique_supp) {
            DB::insert('insert into tm_rayon_caracteristique_valeurs (rayon_id, caracteristique_id, valeur_id, deleted, created_at, updated_at, categorie_id) values (?, ?, ?, ?, ?, ?, ?)', [0, $request->caracteristique_name, $caracteristique_supp, 0, '2022-07-21 16:01:39', '2022-07-21 16:01:39', $request->categorie ]);
        }
        return response()->json([$request->caracteristique_values]);
    }

    public function ajoutCaracteristique(Request $request) {
        DB::insert('insert into tm_caracteristiques (libelle, demander_valeur, type_caracteristique, type_valeur, description, deleted, archived, locked, created_at,  updated_at, icone, required_value, nature_caracteristique) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->caracteristique_value, 1, 'number', '', '0', '0', '0', '2022-07-21 16:01:39', '2022-07-21 16:01:39', '', '0', '1', 1]);
        return 'ok';
    }

    public function addValeurCaracteristique(Request $request) {
        DB::insert('insert into tm_valeur_caracteristiques ( libelle, description, deleted, archived, locked) values(?, ?, ?, ?, ?) ', [$request->valeur, '', 0, 0, 0]);
        return $request->valeur;
    }
    
}
