<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\ImagesEtagere;
use App\Models\Rayon;
use App\Models\Univer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class FamilleController extends Controller
{
    /**
     * UniverController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'is-admin'])->only(['create', 'store', 'edit', 'update', 'destroy']);
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
        $rayons = Rayon::with('univer')->where([['deleted', 0], ['locked', 0]])->orderBy('libelle', 'asc')->get();

        return response()->view('back.app-modules.familles.add-famille', ['rayons'=>$rayons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try {
           $request->validate(
               [
                   'libelle' => ['required', 'string', 'max:50', Rule::unique('familles', 'libelle')->where(function ($query) use ($request){
                       return $query->where([['rayon_id', self::security($request->get('rayon_id'))], ['deleted', 0], ['locked', 0]]);
                   })],
                   'description' => ['string', 'nullable', 'max:1000'],
                   'rayon_id' => ['required','integer', 'max:100'],

               ],
               [
                   'libelle.*' => "Cette donnée est incorrecte",
                   '*.max' => "Cette donnée à dépassé la taille maximale",
                   '*.string' => "Ce champ ne peut contenir que des caractères",
                   '*.unique' => "Cette valeur existe déjà"
               ]
           );
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }


        try {

            $famille = Famille::create([
                "libelle" => self::security($request->get('libelle')),
                "rayon_id" =>$request->rayon_id,
                "description" => self::security($request->get('description')),

            ]);

            if ($famille instanceof Famille) {
                return back()->with('success-message', "La famille ". $this->text($famille->libelle) ." enrégistré avec succès");
            }
            else return back()->with('error-message', "Une erreur s'est produite. Réessayer s'il vous plaît");
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function show(Famille $famille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function edit(Famille $famille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Famille $famille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Famille $famille)
    {
        //
    }

    public function imagesEtageres($id) {
        $image_etagere = ImagesEtagere::where('id_famille', $id)->get();
        return $image_etagere;
    }
}
