<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $guarded = ['id'];

    public static function possibles()
    {
        return Langue::where([['locked', 0], ['deleted', 0]])->get();
    }
}
