<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date_commande',
        'date_expedition',
        'status',
        'commentaire',  
    ];

    public function produits() { 
        return $this->belongsToMany(Produit::class);
    }
}
