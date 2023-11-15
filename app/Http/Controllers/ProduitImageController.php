<?php

namespace App\Http\Controllers;

use App\Models\ProduitImage;
use Illuminate\Http\Request;

class ProduitImageController extends Controller
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
     * @param  \App\Models\ProduitImage  $produitImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitImage $produitImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitImage  $produitImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitImage $produitImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitImage  $produitImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitImage $produitImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitImage  $produitImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitImage $produitImage)
    {
        //
    }

    public function test_upload(Request $request) {
        $image_name = uniqid();

        $crop_destination = 'uploads/';

        $https_array = [];
        $input_files = [];

        foreach($request->image as $img) {
            if (str_contains($img, 'https://')) {
            //    ---------------- zone https  --------------------
            $extension = pathinfo($img, PATHINFO_EXTENSION);
                // get file content from url
                $imageFullPath1 = $crop_destination . $image_name;
                $https_array[] = $imageFullPath1 ;
                $file = file_get_contents($img);
                $save_from_url = file_put_contents($imageFullPath1, $file);

            }else {
                // zone file normal for uploads
                $imageFullPath2 = $crop_destination . $image_name;
                $input_files[] = $imageFullPath2;

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);

                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);

                file_put_contents($imageFullPath2, $image_base64);

            }
        }

        return [$https_array, $input_files];
    }

}
