<?php

namespace App\Http\Controllers;

use App\Models\ProduitCaracteristique;
use Illuminate\Http\Request;

class ProduitCaracteristiqueController extends Controller
{
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
     * @param  \App\Models\ProduitCaracteristique  $produitCaracteristique
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitCaracteristique $produitCaracteristique)
    {
        return 'HELLO WORLD';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitCaracteristique  $produitCaracteristique
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitCaracteristique $produitCaracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitCaracteristique  $produitCaracteristique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitCaracteristique $produitCaracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitCaracteristique  $produitCaracteristique
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitCaracteristique $produitCaracteristique)
    {
        //
    }
}
