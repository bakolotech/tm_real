<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devise extends Model
{
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public static function possibles()
    {
        return Devise::where([['locked', 0], ['deleted', 0]])->get();
    }

}
