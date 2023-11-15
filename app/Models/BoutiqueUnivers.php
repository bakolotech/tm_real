<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoutiqueUnivers extends Model
{
    use HasFactory;
    protected $fillable = ['univers_id', 'boutique_id'];
}
