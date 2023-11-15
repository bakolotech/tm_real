<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVerificationUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'code',
        'user_id',
    ];
}
