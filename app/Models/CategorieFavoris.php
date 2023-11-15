<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CategorieFavoris extends Model
{
    protected $fillable = ['libelle', 'id_user'];

    public  function userCategorieFavorie() {
        $user = CategorieFavoris::where('id_user', Auth::user()->id);
        return $user;
    }
}
