<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Produit;
class PromotionController extends Controller

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


        $prod = Produit::where('id', 64)->get();
        $status=0;
        $dataPm = $request->except('_token');


        if ($prod[0]->quantite>= $request->nbre_produit) {
                  $status = 1;
                  $promotion = Promotion::create($dataPm);
                  $last_id = $promotion->id;
                  $codepromo = $last_id.'-'.'TM'.rand(1000, 9999);

        return response()->json(['id'=>$last_id,'codepromo'=>$codepromo, 'status' => $status]);

        }

        else{
            $status = 0;
            return response()->json(['status' => $status]);

        }
        // return $prod;






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $promotion = Promotion::find($id)->update(['code_promo' => $request->code_promo]);

       return $promotion;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
