<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchByImage extends Model
{
    protected $fillable = [
        'fr_prodection',
        'en_prediction',
        'product_id'
    ];
}
