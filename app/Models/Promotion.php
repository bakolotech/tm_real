<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // use HasFactory;
    protected $fillable = [
        'ref_produit',
        'remise',
        'nbre_produit',
        'date_expiration',
        'code_promo'
      
    ];
}
