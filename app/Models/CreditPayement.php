<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditPayement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_carte',
        'numero_carte',
        'user_id',
        'adresse_id',
        'nom_proprietaire',
        'date_expiration',
        'code_securite',
    ];


    
}

