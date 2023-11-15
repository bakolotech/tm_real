<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueRecherche extends Model
{
    protected $fillable = [
        'id_produit',
        'id_user',
        'date_recherche'
    ];
}
