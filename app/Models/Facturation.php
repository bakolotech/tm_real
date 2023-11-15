<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_carte',
        'nom_sur_carte',
        'date_expiration',
        'numero_cvv',
        'releve_banque',
        'id_boutique',
        'status'
    ];
}
