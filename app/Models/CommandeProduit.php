<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    protected $fillable = [
        'id_produit',
        'order_id',
        'quantite'
    ];
}
