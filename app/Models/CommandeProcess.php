<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeProcess extends Model
{
    protected $fillable =  [
        'order_id',
        'order_status',
        'step_hour',
        'step_date'
    ];
}
