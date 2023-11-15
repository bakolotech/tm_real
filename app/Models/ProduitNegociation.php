<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitNegociation extends Model
{
    protected $fillable = [
        'user_from',
        'user_to',
        'product_id',
        'text_message',
        'date_message'
    ];
}
