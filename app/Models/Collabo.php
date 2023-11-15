<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Collabo extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_utilisateur',
        'id_boutique',
        'mail_collabo',
        'mail_sender',
        'role_collabo',
        'statut_collabo',
        'authentification_collabo',
        'descrip_collabo'
    ];

    public function userCollab()
    {
        return $this->belongsTo(User::class);
    }
}
