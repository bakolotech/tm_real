<?php

namespace App\Models;

use App\Http\Controllers\MainController;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Pays extends Model
{

    public function states()
    {
        return $this->hasMany(State::class, 'country_code', 'alpha2');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'iso3', 'alpha3');
    }

    public static function possibles()
    {
        return Pays::with('states')->whereNotNUll('images')->orderBy('nom_fr_fr', 'asc')->get();
    }

    public static function getPaysInfos() {

        $pays = Pays::possibles();
        foreach ($pays as $pay) {
            $code_pays = Country::where('iso2', $pay->alpha2)->get();
            // $code_pays = DB::table('countries')
            //                 ->select('countries.*')
            //                 ->where('iso2', $pay->alpha2)->get();
            $img_final = null;
            if ($pay->images != '' && !empty($pay->images)) {
                $img_final = asset('assets/images2/'. $pay->images);
            }
            elseif (file_exists( public_path().'/assets/flags/'. strtoupper($pay->alpha2) .'.svg' )){
                $img_final = asset('assets/flags/'. $pay->alpha2 .'.svg');
            }
            else {
                $img_final = asset('assets/images2/globe.svg');
            }
            foreach($code_pays as $c) {
                $tab_pays[] = collect(['phonecode' => $c->phonecode, 'images' =>  $img_final, 'nom_pays' => $pay->nom_fr_fr]);
                // $pays->phonecode = $c->phonecode;
            }


        }

        return $tab_pays;
    }

    /**
     * @param $id
     * @return Pays|null
     */
    public static function paysById($id)
    {
        $pays = Pays::with(
            [
                'states' => function($query){
                    return $query->with(
                        ['cities']
                    )->orderBy('iso2', 'asc');
                },

                'country' => function ($req) {
                    return $req->with(
                        [
                            'cities' => function($req2){
                                return $req2->orderBy('state_id', 'asc');
                            }
                        ]
                    );
                }
            ]
        )->where('id',$id)->first();
        //dd($pays);
        return $pays;
    }

    /**
     * @param User|null $user
     * @return Pays|null
     */
    public static function getPays(User $user = null)
    {
        //unset($_SESSION['config']);
        if (!isset($_SESSION['config']) || (!isset($_SESSION['config']['user-pays']) || empty($_SESSION['config']['user-pays']))){
            $pays = self::maPosition($user);
            $_SESSION['config']['user-pays'] = $pays->id;
            Main::setSessionProvince($pays->states->first());
        }
        return self::paysById($_SESSION['config']['user-pays']);
    }

    public static function meteo()
    {
        $openweathermap = '33ef06effc77d17367dcdebae88226a0';
        $ipInfo = $_SESSION['config']['ip-info'];
        $jsonurl = "https://api.openweathermap.org/data/2.5/weather?q={$ipInfo->city},{$ipInfo->country}&appid=$openweathermap";

        $json = file_get_contents($jsonurl);

        $weather = json_decode($json);
        $kelvin = $weather->main->temp;
        $celcius = (int) ($kelvin - 273.15);
        //dd($celcius);

    }

    public function getImage($image = null)
    {
        if ($this->images != '' && !empty($this->images)) {
            return asset('assets/images2/'. $this->images);
        }
        elseif (file_exists( public_path().'/assets/flags/'. strtoupper($this->alpha2) .'.svg' )){
            return asset('assets/flags/'. $this->alpha2 .'.svg');
        }
        else {
            return asset('assets/images2/globe.svg');
        }
    }

    public static function getImage2($image = null)
    {
        if (!is_null($image)) {
            return asset('assets/images2/'. $image);
        }
        else return asset('assets/images2/globe.svg');
    }

    /**
     * @param User|null $user
     * @return Pays
     */
    public static function maPosition(User $user = null)
    {
        if (MainController::is_connected()) {
            $IPaddress = $_SERVER['REMOTE_ADDR'];
            if (in_array($IPaddress, ['127.0.0.1', '::1'])) $IPaddress = '160.119.161.33';
           // $paysInfo = json_decode(file_get_contents("https://ipinfo.io/{$IPaddress}?token=9791fd9695d37d"));
           $tab = array('ip' => '154.116.34.71', 'city' => 'Libreville', 'region' => 'Estuaire', 'country' => 'GA', 'loc' => '0.3924,9.4536', 'org' => 'AS16058 Gabon Telecom / Office of Posts and Telecommunications of Gabon', 'timezone' => 'Africa/Libreville');
           $paysInfo = (object) $tab;
            $pays = Pays::with(
                [
                    'states' => function($req) use ($paysInfo){
                        return $req->with(
                            [
                                'cities' => function($req) use ($paysInfo){
                                    return $req->where('name', 'LIKE', $paysInfo->city);
                                }
                            ]
                        )->where([['name', 'LIKE', '%'. $paysInfo->region .'%'], ['country_code', $paysInfo->country]]);
                    },
                    'country' => function ($req) {
                        return $req->with(
                            [
                                'cities' => function($req2){
                                    return $req2->orderBy('state_id', 'asc');
                                }
                            ]
                        );
                    }
                ]
            )->where('alpha2', $paysInfo->country)->first();

            /**
             * Mettre à jour la position de l'utilisateur connecté
             */
            if (Auth::check()) {
                $user = Auth::user();
                $user->pays_id = $pays->id;
                $user->state_id = $pays->states->first()->id;
                $user->save();
            }
            Main::setSessionIpInfo($paysInfo);
        }
        elseif (!is_null($user) && $user instanceof User){
            $pays = $user->pays;
            $pays->states = [$user->province];
            //$state = $user->maville;
        }
        else {
            $pays = Pays::with(
                [
                    'states' => function($req){
                        return $req->where('name', 'LIKE', '%Estuaire%');
                    }
                ]
            )->where('id', 80)->first();
        }

        $_SESSION['config']['ma-position'] = $pays->toArray();

        return $pays;
    }

}
