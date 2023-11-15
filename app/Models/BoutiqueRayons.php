<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoutiqueRayons extends Model
{
    use HasFactory;
    protected $fillable = ['rayon_id', 'boutique_id'];
}
