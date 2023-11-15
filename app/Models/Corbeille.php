<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corbeille extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'date_mise_en_corbeille'
    ];
}
