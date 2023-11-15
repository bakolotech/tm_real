<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesFavoris extends Model
{
    protected $fillable = ['id_produit', 'id_user', 'id_categorie'];
}
