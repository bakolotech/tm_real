<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    public static function getSky()
    {
        if (date('H') < 14) {
            $pre2pm = true;
        }
    }
}
