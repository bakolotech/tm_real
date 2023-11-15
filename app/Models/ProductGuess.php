<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGuess extends Model
{

    protected $fillable = [
        'id_produit',
        'counter',
    ];

}
