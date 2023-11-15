<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoutiqueProduitCaracteristique extends Model
{
    use HasFactory;
    protected $fillable = ['id_boutique', 'libelle'];

    public function boutiqueProduitCaracteristique() {
        return $this->hasMany(BoutiqueProduitCarValeur::class, 'idBoutiqueCarValeur');
    }
}
