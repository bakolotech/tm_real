<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param $data
     * @return string
     */
    public static function security($data)
    {
        return htmlentities(trim(stripslashes($data)));
    }

    public static  function errorFormChampEmail()
    {
        $message = "Adresse mail  incorrect";
        $error = 2;

            $data = [
                        'error' => $error,
                        'text' =>$message
                    ];

            return $data;

    }

    public static  function errorFormChampPassword()
    {
        $message = "mot de passe incorrect";
        $error = 2;

        $data = [
            'error' => $error,
            'text' =>$message
        ];

        return $data;

    }

    /**
     * @param Request $request
     * @param $tag
     * @param $disk
     * @param $oldFile
     * @param $path
     * @return bool
     */
    public static function editFile(Request $request, $tag, $disk, $oldFile, $path)
    {

        if ($request->hasFile($tag)) {
            try {
                $request->validate(
                    [$tag => "required", 'max:1000']
                );
                Storage::disk($disk)->delete($oldFile);
                return Storage::disk($disk)->put($path, $request->file()[$tag]);
            }
            catch (\Exception $exception){
                throw new \Exception("les images ne doivent pas dépasser 1Mo");
            }
        }
        else {
            return $oldFile;
        }
    }

    /**
     * Methode de sauvégarde des images dans un disque.
     *
     * @param Request $request
     * @param $requestTag , la clé du fichier dans la resquest
     * @param $disk , Le chemin principal de sauvegarde (voir tous les chemins dans config>filesystems)
     * @param null $complementPath , un complement de chemin (Ex : un sous dossier dans le chamin principal)
     * @return bool
     * @throws \Exception
     */
    public static function storeFile(Request $request, $requestTag, $disk, $complementPath = null)
    {
        try {
            if($request->hasFile($requestTag)){
                return Storage::disk($disk)->put($complementPath, $request->file()[$requestTag]);
            }
        }
        catch (\Exception $exception){
            dd('Une erreur');
            throw new \Exception("Une erreur s'est produite lors du chargement du fichier ". $requestTag);
        }
    }

    /**
     * @param $data
     * @return string|string[]
     */
    public function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

    /**
     * @param $data
     * @return string|string[]
     */
    public static function text2($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }
}
