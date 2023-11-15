<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendInvitation extends Model
{
    use HasFactory;

    protected $fillable=[
        'email_notif',
        'token',
        'sender',
        'statut_notif',
        'role_notif'
    ];
}
