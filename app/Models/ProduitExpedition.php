<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitExpedition extends Model
{
    // use HasFactory;
   protected  $fillable = [
        'id_produit',
        'id_expedition',
        'produit_id',
        'paye_par',
        'prix',
    ];
}
