<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobilePayement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_service',
        'numero_marchand',
        'type_service',
        'id_marchand',
        'status'
    ];
}
