<?php

namespace App;

use App\Email\Inscription;
use App\Models\City;
use App\Models\Devise;
use App\Models\Langue;
use App\Models\Main;
use App\Models\NotificationConfig;
use Illuminate\Support\Facades\Notification;
use App\Notifications\verifyVendeurEmail;
use App\Models\Pays;
use App\Models\State;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\RecapCommande;
use Illuminate\Support\Facades\DB;
use App\Models\PhoneVerificationUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notificationConfig()
    {
        return $this->hasOne(NotificationConfig::class, 'user_id');
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }

    public function province()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function devise()
    {
        return $this->belongsTo(Devise::class, 'devise_id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    public function maville()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function accountLocked()
    {
        if ($this->locked == 1) {
            return true;
        }
        return false;
    }

    public function completeName()
    {
        return strtoupper($this->nom) .' '. ucfirst($this->prenom);
    }

    public function getNom()
    {
        return strtoupper($this->nom);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPrenom()
    {
        return ucfirst($this->prenom);
    }

    public function getActiveAccountLink()
    {
        return url('confirmation/'. $this->remember_token .'/'. $this->email);
    }

    public function sendEmail()
    {

        $this->remember_token = Main::getStrKey(60);
        $this->save();
        $user = $this;

        $unique_code = rand(1000,9999);
        $user->code_validation = $unique_code;

        if (empty($user->email) || ($user->email == "")) {
            $phone_confirmation = [
                'phone_number' => $user->portable,
                'code' => $unique_code,
                'user_id' => $user->id
            ];
    
            $phone_verification = PhoneVerificationUser::create($phone_confirmation);
        }else {
            $phone_confirmation = [
                'phone_number' => $user->email,
                'code' => $unique_code,
                'user_id' => $user->id
            ];
    
            $phone_verification = PhoneVerificationUser::create($phone_confirmation);
        }

        
        Mail::to($user->email)->send(new Inscription($user));

    }

    public function sendVendeurEmailVerification($url)
    {
        $user = $this;
        $email = Notification::route('mail', $user->email)->notify(new verifyVendeurEmail($url));
    }

    public function customId()
    {
        return 'N° '. $this->personal_key;
    }

    public function getPic()
    {
        if (isset($this->image) && $this->image != '' && !empty($this->image)) {
            return asset('storage/images/profil-imgs/'. $this->image);
        }
        else return asset('storage/images/ptofil-imgs/user-icon.svg');
    }

    public function getPic2()
    {
        if (isset($this->image) && $this->image != '' && !empty($this->image)) {
            return asset('storage/images/profil-imgs/'. $this->image);
        }
        else return asset('storage/images/ptofil-imgs/user-icon2.svg');
    }


    /**
     * @param $email
     * @return \Illuminate\Database\Concerns\BuildsQueries|\Illuminate\Database\Eloquent\Builder
     */
    public static function getUserByEmail($email)
    {
        return User::with(
            [
                'notificationConfig',
                'pays',
                'province',
                'maville',
                'langue',
                'devise'
            ]
        )->where([['deleted', 0], ['email', $email]]);
    }

    public static function getUserByPortable($portable)
    {
        return User::with(
            [
                'notificationConfig',
                'pays',
                'province',
                'maville',
                'langue',
                'devise'
            ]
        )->where([['deleted', 0], ['portable', $portable]]);
    }

    /**
     * @return string
     */
    public static function getImage()
    {
        if(Auth::check() && !is_null(Auth::user()->image) && !empty(Auth::user()->image)){
            if (str_contains(Auth::user()->image, 'http://') || str_contains(Auth::user()->image, 'https://')) {
                return Auth::user()->image;
            }
            else{
                return asset('/'. Auth::user()->image);
            }
        }
        return asset('storage/images/ptofil-imgs/user-icon.svg');
    }

    public function getAuthUser()
    {
        if(!isset($_SESSION['config']['user-logged']) || (isset($_SESSION['config']['user-logged']) && count($_SESSION['config']['user-logged']) < 1)) {
            $_SESSION['config']['user-logged'] = (self::getUserByEmail($this->email)->where('id', $this->id)->first())->toArray();
        }
        return $_SESSION['config']['user-logged'];
    }

    public function refreshAuthUser()
    {
        $_SESSION['config']['user-logged'] = (self::getUserByEmail($this->email)->where('id', $this->id)->first())->toArray();
    }

    public function isAdmin()
    {
        if ($this->role = 1) {
            return true;
        }
        return  false;
    }

    public function text($data)
    {
        return html_entity_decode(str_replace("'", "&#39;", html_entity_decode($data)));
    }

    public function getUserCommade($id) {
        $user_commande = RecapCommande::where('user_id', $id)->get();
        $total_des_commande = 0;
        if (count($user_commande) > 0) {

            $total_des_commande = count($user_commande);

            return $total_des_commande;

        }
    }

}
