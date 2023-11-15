<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CarnetAdresse extends Model
{
    // protected $guarded=[];
    protected $fillable = ['latitude', 'longitude'];

    public static function getCarnetByUser()
    {
        $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();
        return $carnets;
    }

    public static function getCarnetByUserDetail()
    {
        $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();
        if ($carnets) {
            $carnet_details = "Non défini";
        } else {
            $carnet_details = $carnets[0]->adresse." ".$carnets[0]->complement." ".$carnets[0]->ville.",".$carnets[0]->portable ;
        }
        return $carnet_details;
    }
}
