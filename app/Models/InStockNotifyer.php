<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InStockNotifyer extends Model
{
    protected $fillable = [
        'user_id',
        'id_produit'
    ];
}
